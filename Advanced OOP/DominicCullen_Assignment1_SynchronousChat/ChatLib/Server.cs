using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Sockets;
using System.Net;

namespace ChatLib
{
    public class Server
    {
        private TcpListener server = null;
        private TcpClient client = null;
        public const Int32 port = 13000;
        public IPAddress localAddr = IPAddress.Parse("127.0.0.1");

        public String receiveMessage = null;
        public Byte[] sendData = new Byte[256];
        public Byte[] receiveData = new Byte[256];

        private NetworkStream stream = null;

        /// <summary>
        /// Starts up the server
        /// </summary>
        /// <returns>String stating it's waiting for a connection</returns>
        public string StartUp()
        {
            
            try{
            
                // TcpListener server = new TcpListener(port);
                server = new TcpListener(localAddr, port);

                // Start listening for client requests.
                server.Start();

                return "Waiting for a client connection... ";

            }catch (SocketException e) {
                return e.ToString();
            }
            
        }//end startUp()

        /// <summary>
        /// Performs a blocking call for accepting requests and connects the stream
        /// </summary>
        /// <returns>String stating it's connected and general info about app</returns>
        public string ListeningForConnection()
        {

            // Perform a blocking call to accept requests.
            client = server.AcceptTcpClient();
            stream = client.GetStream();
            return "------------------------------------\nClient has connected!\n\n" + 
                "Press 'i' to enter input mode and send a message\nSend 'quit' to exit the application\n";

        }//end listeningForConnection()

        /// <summary>
        /// Converts the parameter and puts it into a byte array and then sends that to the client
        /// </summary>
        /// <param name="message"></param>
        public void SendingMessage(string message)
        {
            if (message == "quit")
            {
                stream.Close();
                client.Close();
                Environment.Exit(0);
            }
            else
            {
                //converts message to bytes and then writes them to the network stream
                sendData = System.Text.Encoding.ASCII.GetBytes(message);
                stream.Write(sendData, 0, sendData.Length);
            }

        }

        public bool IsDataAvailable()
        {
            if (stream.DataAvailable == true)
                return true;
            else
                return false;
        }

        public int Read()
        {
            return stream.Read(receiveData, 0, receiveData.Length);
        }

        public void Shutdown()
        {
            stream.Close();
            server.Stop();
        }

    }//end server class
}
