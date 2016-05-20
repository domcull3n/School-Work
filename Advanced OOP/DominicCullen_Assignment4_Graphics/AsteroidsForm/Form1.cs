using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using AsteroidLib;

namespace AsteroidsForm
{
    public partial class Asteroids : Form
    {
        private List<Asteroid> asteroids = new List<Asteroid>();
        private int numOfAsteroids = 5;

        private Player player;

        private bool mainScreenCheck = true;
        private bool gameOverCheck = false;
        private bool gameWinCheck = false;
        private bool gameRunningCheck = false;

        /// <summary>
        /// Creates the asteroids form and generates the game
        /// </summary>
        public Asteroids()
        {
            InitializeComponent();

            player = new Player(this.DisplayRectangle);
            GenerateAsteroids();
        }

        private void Asteroids_Paint(object sender, PaintEventArgs e)
        {
            if (mainScreenCheck == true)
            {
                Font asteroidFont = new Font("Arial", 72, FontStyle.Underline, GraphicsUnit.Point);
                StringFormat sf = new StringFormat();
                sf.Alignment = StringAlignment.Center;
                sf.LineAlignment = StringAlignment.Center;

                e.Graphics.DrawString("ASTEROIDS", asteroidFont, Brushes.White, this.DisplayRectangle, sf);

                Font play = new Font("Arial", 16, FontStyle.Bold, GraphicsUnit.Point);
                sf.Alignment = StringAlignment.Center;
                sf.LineAlignment = StringAlignment.Far;

                e.Graphics.DrawString("Press space to play", play, Brushes.White, this.DisplayRectangle, sf);

            }
            else if (gameOverCheck == true)
            {
                Font asteroidFont = new Font("Arial", 72, FontStyle.Underline, GraphicsUnit.Point);

                StringFormat sf = new StringFormat();
                sf.Alignment = StringAlignment.Center;
                sf.LineAlignment = StringAlignment.Center;

                e.Graphics.DrawString("GAME OVER", asteroidFont, Brushes.White, this.DisplayRectangle, sf);

                Font play = new Font("Arial", 16, FontStyle.Bold, GraphicsUnit.Point);
                sf.Alignment = StringAlignment.Center;
                sf.LineAlignment = StringAlignment.Far;

                e.Graphics.DrawString("Press space to restart", play, Brushes.White, this.DisplayRectangle, sf);
   
            }
            else if (gameRunningCheck == true)
            {
                foreach (Asteroid a in asteroids)
                {
                    a.Draw(e.Graphics);
                }

                foreach (Projectile p in player.projectiles)
                {
                    p.Draw(e.Graphics);
                }

                player.Draw(e.Graphics);
            }
            else if (gameWinCheck == true)
            {
                Font asteroidFont = new Font("Arial", 72, FontStyle.Underline, GraphicsUnit.Point);

                StringFormat sf = new StringFormat();
                sf.Alignment = StringAlignment.Center;
                sf.LineAlignment = StringAlignment.Center;

                e.Graphics.DrawString("YOU WIN!!", asteroidFont, Brushes.White, this.DisplayRectangle, sf);

                Font play = new Font("Arial", 16, FontStyle.Bold, GraphicsUnit.Point);
                sf.Alignment = StringAlignment.Center;
                sf.LineAlignment = StringAlignment.Far;

                e.Graphics.DrawString("Press space to advance to the next level", play, Brushes.White, this.DisplayRectangle, sf);
            }
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            WinCheck();
            HandleCollisions();

            foreach (Asteroid a in asteroids)
            {
                a.Move();
            }

            foreach (Projectile p in player.projectiles)
            {
                p.Move();
            }

            Invalidate();
        }

        private void GenerateAsteroids()
        {
            asteroids.Clear();

            for (int i = 0; i < numOfAsteroids; i++)
            {
                asteroids.Add(new Asteroid(this.DisplayRectangle));
            }
        }

        private void HandleCollisions()
        {

            for (int a = 0; a < asteroids.Count; a++) //asteroids collision
            {
                if (asteroids[a].innerRectangle.Y <= 0) //top wall
                {
                    asteroids[a].yVelocity *= -1;
                }
                else if (asteroids[a].innerRectangle.X <= 0) //left wall
                {
                    asteroids[a].xVelocity *= -1;
                }
                else if (asteroids[a].innerRectangle.X >= this.DisplayRectangle.Right - asteroids[a].innerRectangle.Width)
                {
                    asteroids[a].xVelocity *= -1;
                }
                else if (asteroids[a].innerRectangle.Y >= this.DisplayRectangle.Bottom - asteroids[a].innerRectangle.Height)
                {
                    asteroids[a].yVelocity *= -1;
                }
                else if (asteroids[a].innerRectangle.IntersectsWith(player.playerRectangle))
                {
                    GameOver();
                }

                for (int p = 0; p < player.projectiles.Count; p++) //projectiles collision
                {
                    if (a < asteroids.Count && player.projectiles[p].innerRectangle.IntersectsWith(asteroids[a].innerRectangle))
                    {
                        player.projectiles.RemoveAt(p);
                        asteroids.RemoveAt(a);
                    }
                    else if (player.projectiles[p].innerRectangle.X >= this.DisplayRectangle.Right -
                        player.projectiles[p].innerRectangle.Width)
                    {
                        player.projectiles.RemoveAt(p);
                    }
                    else if (player.projectiles[p].innerRectangle.Y >= this.DisplayRectangle.Bottom -
                        player.projectiles[p].innerRectangle.Height)
                    {
                        player.projectiles.RemoveAt(p);
                    }
                    else if (player.projectiles[p].innerRectangle.X + player.projectiles[p].innerRectangle.Width <= 0)
                    {
                        player.projectiles.RemoveAt(p);
                    }
                    else if (player.projectiles[p].innerRectangle.Y + player.projectiles[p].innerRectangle.Height <= 0)
                    {
                        player.projectiles.RemoveAt(p);
                    }
                }

            }

        }//end HandleCollisions

        private void Asteroids_KeyDown(object sender, KeyEventArgs e)
        {
            if (gameRunningCheck == true)
            {
                switch (e.KeyCode)
                {
                    case Keys.W:
                        {
                            player.Move(Player.Direction.UP);
                            break;
                        }

                    case Keys.D:
                        {
                            player.Move(Player.Direction.RIGHT);
                            break;
                        }

                    case Keys.S:
                        {
                            player.Move(Player.Direction.DOWN);
                            break;
                        }

                    case Keys.A:
                        {
                            player.Move(Player.Direction.LEFT);
                            break;
                        }
                }
            }

            if (mainScreenCheck == true || gameOverCheck == true || gameWinCheck == true)
            {
                if (e.KeyCode == Keys.Space && gameOverCheck == true || e.KeyCode == Keys.Space && gameWinCheck == true)
                {
                    Restarting();
                }
                else if (e.KeyCode == Keys.Space) //starts the game
                {
                    mainScreenCheck = false;
                    gameOverCheck = false;
                    gameWinCheck = false;

                    gameRunningCheck = true;
                    timer1.Enabled = true;
                }
                
            }
        }

        private void Asteroids_MouseClick(object sender, MouseEventArgs e)
        {
            if (gameOverCheck == false)
            {
                player.ShootProjectile(e.X, e.Y);
            }
        }

        private void GameOver()
        {
            timer1.Enabled = false;
            gameOverCheck = true;
            gameRunningCheck = false;
            gameWinCheck = false;

            numOfAsteroids = 5;

            asteroids.Clear();
            player.projectiles.Clear();
            Invalidate();
        }

        private void WinCheck()
        {
            if (asteroids.Count <= 0 )
            {
                GameWin();
            }
        }

        private void GameWin()
        {
            numOfAsteroids++;

            timer1.Enabled = false;

            gameWinCheck = true;
            gameRunningCheck = false;
            gameOverCheck = false;

            player.projectiles.Clear();
            Invalidate();
        }

        private void Restarting()
        {
            GenerateAsteroids();
            
            player = new Player(this.DisplayRectangle);

            timer1.Enabled = true;

            gameRunningCheck = true;
            gameOverCheck = false;
            gameWinCheck = false;

        }
    }
}
