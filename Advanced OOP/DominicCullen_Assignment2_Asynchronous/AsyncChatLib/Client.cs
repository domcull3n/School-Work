using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Sockets;
using LoggingLib;

namespace AsyncChatLib
{
    /// <summary>
    /// Class that will connect to a TCPlistener class
    /// </summary>
    public class Client
    {
        /// <summary>
        /// Event handler for the client class to talk to the form
        /// </summary>
        public event ReceiveMessageHandler ReceiveMsgEvent;

        private TcpClient client = null;
        private NetworkStream stream = null;

        private String receiveMessage = null;
        private Byte[] sendData = new Byte[256];
        private Byte[] receiveData = new Byte[256];

        private volatile bool stopListening = false;

        /// <summary>
        /// Volatile bool to flag that the application should stop listening
        /// </summary>
        public bool StopListening { get; set; }

        private Logger log = new Logger();
        

        /// <summary>
        /// Connects the client to the already running server
        /// </summary>
        /// <param name="server"></param>
        /// <returns>String for saying it's connected</returns>
        public string Connect(String server)
        {
            try
            {
                // Create a TcpClient.
                // Note, for this client to work you need to have a TcpServer 
                // connected to the same address as specified by the server, port
                // combination.
                Int32 port = 13000;
                client = new TcpClient(server, port);

                stream = client.GetStream();

                return "\nConnected to server!\n------------------------------------\n";

            }
            catch (ArgumentNullException e)
            {
                return e.ToString();
            }
            catch (SocketException e)
            {
                return e.ToString();
            }

        }

        /// <summary>
        /// Converts the parameter and puts it into a byte array and then sends that to the client
        /// </summary>
        /// <param name="message"></param>
        public bool SendingMessage(string message)
        {
            if (stream != null)
            { 
                //converts message to bytes and then writes them to the network stream
                sendData = System.Text.Encoding.ASCII.GetBytes(message);
                stream.Write(sendData, 0, sendData.Length);
                log.WriteMessage("Client",message);
                return true;
            }
            else
            {
                return false;
            }
        }

        /// <summary>
        /// A method to determine data availability
        /// </summary>
        /// <returns>Bool to say if data is available in the stream</returns>
        public bool IsDataAvailable()
        {
            if (stream.DataAvailable == true)
                return true;
            else
                return false;
        }

        /// <summary>
        /// Method that loops to see if data is available to be read from the stream (To be run Asynchronously) 
        /// </summary>
        public void Listen()
        {
            while (true)
            {
                if (!stopListening)
                {
                    if (IsDataAvailable())
                    {
                        int i = Read();

                        if (i != 0)
                        {
                            receiveMessage = System.Text.Encoding.ASCII.GetString(receiveData, 0, i);
                            log.WriteMessage("Server", receiveMessage);
                        }
                            
                        if (receiveMessage == "quit")
                        {
                            stopListening = true;
                            Disconnect();

                            if (ReceiveMsgEvent != null)
                                ReceiveMsgEvent(this, new ReceiveMessageEventArgs("Server has disconnected"));

                            break;
                        }

                        if (ReceiveMsgEvent != null && i != 0)
                            ReceiveMsgEvent(this, new ReceiveMessageEventArgs(receiveMessage));
                    }
                }
                else
                {
                    break;
                }
            }
        }

        /// <summary>
        /// Reads bytes from the network stream into the client class, byte buffer
        /// </summary>
        /// <returns>Returns amount of bytes read into the clients buffer</returns>
        public int Read()
        {
            return stream.Read(receiveData, 0, receiveData.Length);
        }

        /// <summary>
        /// Determines wether the client is connected or not
        /// </summary>
        /// <returns>Bool depending on if the client is connected or not</returns>
        public bool IsConnected()
        {
            if (client != null)
                return true;
            else
                return false;
        }

        /// <summary>
        /// Disconnects the client stream and sets a flag so the other thread can exit gracefully
        /// </summary>
        public void Disconnect()
        {
            stopListening = true;
            if(stream != null)
            {
                stream.Close();
                stream = null;
                client.Close();
            }

            log.Close();
        }

    }//end client class
}