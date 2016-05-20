using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AsyncChatLib
{
    public class ReceiveMessageEventArgs : EventArgs
    {
        public ReceiveMessageEventArgs(string message)
        {
            Message = message;
        }

        public string Message { get; }
    }
}
