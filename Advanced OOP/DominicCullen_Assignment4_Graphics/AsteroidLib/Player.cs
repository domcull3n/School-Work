using System;
using System.Collections.Generic;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AsteroidLib
{
    /// <summary>
    /// Class that defines the player object
    /// </summary>
    public class Player
    {
        /// <summary>
        /// Enum for specific directions of keyboard
        /// </summary>
        public enum Direction //enum for direction of movement
        {
            UP,
            RIGHT,
            LEFT,
            DOWN
        }

        private Rectangle gameArea; //form rectangle

        /// <summary>
        /// List of type projectiles
        /// </summary>
        public List<Projectile> projectiles = new List<Projectile>(); 

        private Point[] polyPoints = new Point[] { new Point(50, 50), new Point(40, 75), new Point(60, 75) }; //points of the triangle
        
        private Brush drawBrush = new SolidBrush(Color.White);

        private const int speed = 20;

        /// <summary>
        /// Rectangle which defines the hitbox for the player
        /// </summary>
        public Rectangle playerRectangle = new Rectangle();

        /// <summary>
        /// Constructor for the player class, initializes position and size
        /// </summary>
        /// <param name="gameArea"></param>
        public Player(Rectangle gameArea)
        {
            this.gameArea = gameArea;

            //Creates a rectangle hitbox around the player triangle
            playerRectangle.Width = (polyPoints[2].X - polyPoints[1].X);
            playerRectangle.Height = (polyPoints[1].Y - polyPoints[0].Y);

            playerRectangle.X = polyPoints[1].X; //sets the position of the hitbox
            playerRectangle.Y = polyPoints[0].Y;
        }//end constructor

        /// <summary>
        /// Draws the player object, using the points array
        /// </summary>
        /// <param name="g"></param>
        public void Draw(Graphics g)
        {
            g.FillPolygon(drawBrush, polyPoints);
        }

        /// <summary>
        /// Moves the player object by it's speed and the direction passed
        /// </summary>
        /// <param name="direction"></param>
        public void Move(Direction direction)
        {
            switch (direction)
            {
                case Direction.UP:
                    {
                        if (polyPoints[0].Y > 0)
                        {
                            for (int i = 0; i < polyPoints.Length; i++)
                                polyPoints[i].Y -= speed;

                            playerRectangle.Y -= speed;
                        }
                        break;
                    }

                case Direction.RIGHT:
                    {
                        if (polyPoints[2].X + speed < gameArea.Width)
                        {
                            for (int i = 0; i < polyPoints.Length; i++)
                                polyPoints[i].X += speed;

                            playerRectangle.X += speed;
                        }
                        break;
                    }

                case Direction.DOWN:
                    {
                        if (polyPoints[1].Y + speed < gameArea.Height && polyPoints[2].Y + speed < gameArea.Height)
                        {
                            for (int i = 0; i < polyPoints.Length; i++)
                                polyPoints[i].Y += speed;

                            playerRectangle.Y += speed;
                        }
                        break;
                    }

                case Direction.LEFT:
                    {
                        if (polyPoints[1].X > 0)
                        {
                            for (int i = 0; i < polyPoints.Length; i++)
                                polyPoints[i].X -= speed;

                            playerRectangle.X -= speed;
                        }
                        break;
                    }
            }
        }

        /// <summary>
        /// Creates a new projectile and adds it to the projectiles list
        /// </summary>
        /// <param name="mouseX"></param>
        /// <param name="mouseY"></param>
        public void ShootProjectile(int mouseX, int mouseY)
        {
            projectiles.Add(new Projectile(mouseX, mouseY, polyPoints[0]));
        }
    }
}
