using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using NLog;

namespace LoggingLib
{
    /// <summary>
    /// Logging class using the NLog Framework
    /// </summary>
    public class NLog : ILoggingService
    {
        private static Logger logger = LogManager.GetCurrentClassLogger();

        /// <summary>
        /// Logging the message to a file
        /// </summary>
        /// <param name="message"></param>
        public void Log(string message)
        {
            logger.Info(message);
        }
    }
}
