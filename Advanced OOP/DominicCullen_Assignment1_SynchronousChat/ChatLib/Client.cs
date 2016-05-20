using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Sockets;

namespace ChatLib
{
    public class Client
    {
        private TcpClient client = null;
        private NetworkStream stream = null;

        public String sendMessage = null;
        public String receiveMessage = null;
        public Byte[] sendData = new Byte[256];
        public Byte[] receiveData = new Byte[256];

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

                return "Connected to server!\n------------------------------------\n";

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
    }//end client class
}
