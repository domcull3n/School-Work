using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;
using LoggingLib;
using AsyncChatLib;
using Microsoft.Practices.Unity;
using Ninject;
using AsyncLogger;

namespace ChatForm
{
    static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            //Application.Run(new Form1(new Client(new TextFileLogger())));

            UnityContainer container = new UnityContainer();
            container.RegisterType<LoggingLib.ILoggingService, TextFileLogger>();
            //container.RegisterType<Client, Client>(); - Redundant, due to lazy instantiation

            Application.Run(container.Resolve<Form1>());

            //IKernel kernel = new StandardKernel();
            //kernel.Bind<AsyncLogger.ILoggingService>().To<TextLogger>();

            //var ninForm = kernel.Get<Form1>();
            //Application.Run(ninForm);

        }
    }
}
