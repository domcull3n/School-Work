using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AsyncChatLib
{
    /// <summary>
    /// Interface for the client class and other network related classes
    /// </summary>
    public interface IMessage
    {
        /// <summary>
        /// Connect to the server
        /// </summary>
        /// <param name="server"></param>
        /// <returns></returns>
        string Connect(string server);
    }
}
