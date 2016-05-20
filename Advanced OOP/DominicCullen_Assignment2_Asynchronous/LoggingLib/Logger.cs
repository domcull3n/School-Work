using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;

namespace LoggingLib
{
    public class Logger
    {
        public StreamWriter logFile = new StreamWriter(DateTime.Now.ToFileTime() + ".log", true);

        public void WriteMessage(string sender, string message)
        {
            logFile.WriteLine(DateTime.Now.ToString() + " - " + sender + ": " + message);
        }

        public void Close()
        {
            logFile.Close();
        }
    }
}
