using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using AsyncChatLib;
using System.Threading;
using LoggingLib;

namespace ChatForm
{
    public partial class Form1 : Form
    {
        private Client client;

        private Thread listeningThread;

        public Form1()
        {
            InitializeComponent();
        }

        //public Form1(Client client)
        //{
        //    InitializeComponent();
        //    this.client = client;
        //    client.ReceiveMsgEvent += new ReceiveMessageHandler(UpdateConvo);
        //}

        private void connectToolStripMenuItem_Click(object sender, EventArgs e)
        {
            if (Client.IsConnected() == false)
            {
                convoTxtBox.AppendText(Client.Connect("127.0.0.1"));
                //start the thread here and make it listen for recieving data

                listeningThread = new Thread(client.Listen);
                listeningThread.Name = "ListeningThread";
                listeningThread.Start();
            }

            sendMsgBtn.Enabled = true;
        }


        public Client Client
        {
            get {

                if (client == null)
                {
                    client = new Client(new TextFileLogger());
                    client.ReceiveMsgEvent += new ReceiveMessageHandler(UpdateConvo);
                }
                return client;
            }

        }

        private void sendMsgBtn_Click(object sender, EventArgs e)
        {
            if (sendMsgTxt.Text.Length > 0 &&
                Client.SendingMessage(sendMsgTxt.Text) == true)
            {
                convoTxtBox.AppendText("\n" + ">> " + sendMsgTxt.Text);
                sendMsgTxt.Clear();
            }
        }

        private void UpdateConvo(object sender, ReceiveMessageEventArgs e)
        {
            if (convoTxtBox.InvokeRequired)
            {
                MethodInvoker mi = new MethodInvoker(
                    delegate ()
                    {
                        convoTxtBox.AppendText("\n" + e.Message);
                    }
                );

                convoTxtBox.BeginInvoke(mi);
            }
        }

        private void disconnectToolStripMenuItem_Click(object sender, EventArgs e)
        {
            if (client != null && listeningThread != null)
            {
                client.Disconnect();
                listeningThread.Join();
                client = null;
                sendMsgBtn.Enabled = false;
                convoTxtBox.AppendText("\nYou have disconnected");
            }
        }

        private void Form1_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (client != null)
            {
                Client.Disconnect();
                if (listeningThread != null)
                    listeningThread.Join();
                //client = null;
            }
        }

        private void exitToolStripMenuItem_Click(object sender, EventArgs e)
        {
            if (client != null)
            {
                Client.Disconnect();
                if (listeningThread != null)
                    listeningThread.Join();
                //client = null;
            }

            this.Close();
        }
    }
}
