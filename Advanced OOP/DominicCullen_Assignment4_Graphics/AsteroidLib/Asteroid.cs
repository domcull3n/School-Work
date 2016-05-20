using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Drawing;

namespace AsteroidLib
{
    /// <summary>
    /// Class that defines the asteroid object
    /// </summary>
    public class Asteroid
    {
        /// <summary>
        /// Velocities for both the x and y axis
        /// </summary>
        public int xVelocity, yVelocity; 

        /// <summary>
        /// Rectangle that specifies the size and hitbox for the asteroid
        /// </summary>
        public Rectangle innerRectangle;

        private int height, width;

        private Pen pen = new Pen(Color.White, 1);

        private static Random rand = new Random();

        Image asteroidsImage;

        /// <summary>
        /// Constructor for Asteroid that initializes the height and width and creates the asteroid
        /// </summary>
        /// <param name="gameArea"></param>
        public Asteroid(Rectangle gameArea)
        {
            height = width = rand.Next(50, 110 + 1);

            innerRectangle.Height = height;
            innerRectangle.Width = width;

            innerRectangle.X = rand.Next(0, gameArea.Width - innerRectangle.Width); //setting starting positions
            innerRectangle.Y = rand.Next(0, gameArea.Height - innerRectangle.Height);

            xVelocity = rand.Next(-6, 6 + 1);
            yVelocity = rand.Next(-6, 6 + 1);

            Image tempImage = Image.FromFile("C:\\Users\\domcu\\Documents\\Code\\Advanced OOP\\w0279091\\DominicCullen_Assignment4_Graphics\\AsteroidLib\\asteroid.png");
            asteroidsImage = ScaleImage(tempImage, height, width);
        }//end constructor

        /// <summary>
        /// Draws the asteroid object
        /// </summary>
        /// <param name="g"></param>
        public void Draw(Graphics g)
        {
            g.DrawImage(asteroidsImage, new Point(innerRectangle.X, innerRectangle.Y));
        }

        /// <summary>
        /// Moves the asteroid by the specified velocity
        /// </summary>
        public void Move()
        {
            innerRectangle.X += xVelocity;
            innerRectangle.Y += yVelocity;
        }

        private Image ScaleImage(Image image, int maxWidth, int maxHeight)
        {
            var ratioX = (double)maxWidth / image.Width;
            var ratioY = (double)maxHeight / image.Height;
            var ratio = Math.Min(ratioX, ratioY);

            var newWidth = (int)(image.Width * ratio);
            var newHeight = (int)(image.Height * ratio);

            var newImage = new Bitmap(newWidth, newHeight);

            using (var graphics = Graphics.FromImage(newImage))
                graphics.DrawImage(image, 0, 0, newWidth, newHeight);

            return newImage;
        }
    }
}
