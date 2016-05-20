using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Drawing;

namespace AsteroidLib
{
    /// <summary>
    /// Class that defines the projectile object
    /// </summary>
    public class Projectile
    {
        private float slopeY, slopeX;
        
        /// <summary>
        /// Rectangle around the projectiles, used as a hitbox
        /// </summary>
        public RectangleF innerRectangle;

        Brush drawBrush = new SolidBrush(Color.White);

        /// <summary>
        /// Constructor for the projectile, uses parameters passed in to define the speed and direction of it
        /// </summary>
        /// <param name="mouseX"></param>
        /// <param name="mouseY"></param>
        /// <param name="playerPoint"></param>
        public Projectile(int mouseX, int mouseY, Point playerPoint)
        {
            innerRectangle.Width = 7;
            innerRectangle.Height = 7;

            innerRectangle.X = playerPoint.X;
            innerRectangle.Y = playerPoint.Y;

            slopeY = (mouseY - playerPoint.Y) * (float).01;
            slopeX = (mouseX - playerPoint.X) * (float).01;

        }

        /// <summary>
        /// Draws the projectile
        /// </summary>
        /// <param name="g"></param>
        public void Draw(Graphics g)
        {
            g.FillEllipse(drawBrush, innerRectangle);
        }

        /// <summary>
        /// Moves the projectile
        /// </summary>
        public void Move()
        {
            innerRectangle.X += slopeX;
            innerRectangle.Y += slopeY;
        }
    }
}
