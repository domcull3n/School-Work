using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace LoggingLib
{
    /// <summary>
    /// A logger that writes out to a text file
    /// </summary>
    public class TextFileLogger : ILoggingService
    {
        /// <summary>
        /// Logs the message to a text file
        /// </summary>
        /// <param name="message"></param>
        public void Log(string message)
        {
            string fileName = DateTime.Now.ToString("yyyyMMdd") + ".log";

            using (StreamWriter logFile = new StreamWriter(fileName, true))
            {
                logFile.WriteLine(DateTime.Now.ToString() + " - " + message);
            }
        }
    }
}
