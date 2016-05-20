using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using ChatLib;

namespace ChatConsole
{
    class Program
    {

        static void Main(string[] args)
        {

            if (args.Length > 0)
            {
                if (args[0] == "-server")
                {
                    //run as server
                    Server server = new Server();

                    Console.WriteLine(server.StartUp());

                    Console.WriteLine(server.ListeningForConnection());

                    while (true)
                    {
                        try
                        {

                            if (Console.KeyAvailable == true)
                            {
                                ConsoleKeyInfo key = Console.ReadKey(true);

                                if (key.Key == ConsoleKey.I)
                                {
                                    Console.Write(">> ");
                                    server.SendingMessage(Console.ReadLine());
                                }
                            }
                            else if (server.IsDataAvailable() == true)
                            {
                                int i = server.Read();

                                if (i != 0)
                                {
                                    // Translate data bytes to a ASCII string.
                                    server.receiveMessage = System.Text.Encoding.ASCII.GetString(server.receiveData, 0, i);
                                    Console.WriteLine(server.receiveMessage);
                                }
                            }
                        }
                        catch (Exception ex)
                        {
                            Console.WriteLine(ex);
                            Console.ReadKey();
                            Environment.Exit(0);
                        }
                    }
                }
            }
            else
            {
                //run as client
                Client client = new Client();

                Console.WriteLine(client.Connect("127.0.0.1"));

                while (true)
                {
                    try
                    {

                        if (Console.KeyAvailable == true)
                        {
                            ConsoleKeyInfo key = Console.ReadKey(true);

                            if (key.Key == ConsoleKey.I)
                            {
                                Console.Write(">> ");
                                client.SendingMessage(Console.ReadLine());
                            }
                        }
                        else if (client.IsDataAvailable() == true)
                        {
                            int i = client.Read();

                            if (i != 0)
                            {
                                // Translate data bytes to a ASCII string.
                                client.receiveMessage = System.Text.Encoding.ASCII.GetString(client.receiveData, 0, i);
                                Console.WriteLine(client.receiveMessage);
                            }
                        }
                    }
                    catch (Exception ex)
                    {
                        Console.WriteLine(ex);
                        Console.ReadKey();
                        Environment.Exit(0);
                    }
                }
            }

        }//end main()

    }//end class Program
}
