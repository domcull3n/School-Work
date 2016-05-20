using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace LoggingLib
{
    /// <summary>
    /// Interface to be implemented by loggers
    /// </summary>
    public interface ILoggingService
    {
        /// <summary>
        /// Logging function signature
        /// </summary>
        /// <param name="message"></param>
        void Log(string message);
    }
}
