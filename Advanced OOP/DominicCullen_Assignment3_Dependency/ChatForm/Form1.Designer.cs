namespace ChatForm
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.chatFormMenu = new System.Windows.Forms.MenuStrip();
            this.gameToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.exitToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.networkToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.connectToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.disconnectToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.chatFormPic = new System.Windows.Forms.PictureBox();
            this.sendMsgBox = new System.Windows.Forms.GroupBox();
            this.sendMsgBtn = new System.Windows.Forms.Button();
            this.sendMsgTxt = new System.Windows.Forms.TextBox();
            this.convoBox = new System.Windows.Forms.GroupBox();
            this.convoTxtBox = new System.Windows.Forms.RichTextBox();
            this.chatFormMenu.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.chatFormPic)).BeginInit();
            this.sendMsgBox.SuspendLayout();
            this.convoBox.SuspendLayout();
            this.SuspendLayout();
            // 
            // chatFormMenu
            // 
            this.chatFormMenu.ImageScalingSize = new System.Drawing.Size(20, 20);
            this.chatFormMenu.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.gameToolStripMenuItem,
            this.networkToolStripMenuItem});
            this.chatFormMenu.Location = new System.Drawing.Point(0, 0);
            this.chatFormMenu.Name = "chatFormMenu";
            this.chatFormMenu.Size = new System.Drawing.Size(654, 28);
            this.chatFormMenu.TabIndex = 0;
            this.chatFormMenu.Text = "menuStrip1";
            // 
            // gameToolStripMenuItem
            // 
            this.gameToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.exitToolStripMenuItem});
            this.gameToolStripMenuItem.Name = "gameToolStripMenuItem";
            this.gameToolStripMenuItem.Size = new System.Drawing.Size(60, 24);
            this.gameToolStripMenuItem.Text = "Game";
            // 
            // exitToolStripMenuItem
            // 
            this.exitToolStripMenuItem.Name = "exitToolStripMenuItem";
            this.exitToolStripMenuItem.Size = new System.Drawing.Size(181, 26);
            this.exitToolStripMenuItem.Text = "Exit";
            this.exitToolStripMenuItem.Click += new System.EventHandler(this.exitToolStripMenuItem_Click);
            // 
            // networkToolStripMenuItem
            // 
            this.networkToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.connectToolStripMenuItem,
            this.disconnectToolStripMenuItem});
            this.networkToolStripMenuItem.Name = "networkToolStripMenuItem";
            this.networkToolStripMenuItem.Size = new System.Drawing.Size(77, 24);
            this.networkToolStripMenuItem.Text = "Network";
            // 
            // connectToolStripMenuItem
            // 
            this.connectToolStripMenuItem.Name = "connectToolStripMenuItem";
            this.connectToolStripMenuItem.Size = new System.Drawing.Size(157, 26);
            this.connectToolStripMenuItem.Text = "Connect";
            this.connectToolStripMenuItem.Click += new System.EventHandler(this.connectToolStripMenuItem_Click);
            // 
            // disconnectToolStripMenuItem
            // 
            this.disconnectToolStripMenuItem.Name = "disconnectToolStripMenuItem";
            this.disconnectToolStripMenuItem.Size = new System.Drawing.Size(157, 26);
            this.disconnectToolStripMenuItem.Text = "Disconnect";
            this.disconnectToolStripMenuItem.Click += new System.EventHandler(this.disconnectToolStripMenuItem_Click);
            // 
            // chatFormPic
            // 
            this.chatFormPic.Image = global::ChatForm.Properties.Resources.SF2;
            this.chatFormPic.Location = new System.Drawing.Point(0, 32);
            this.chatFormPic.Name = "chatFormPic";
            this.chatFormPic.Size = new System.Drawing.Size(654, 318);
            this.chatFormPic.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.chatFormPic.TabIndex = 1;
            this.chatFormPic.TabStop = false;
            // 
            // sendMsgBox
            // 
            this.sendMsgBox.Controls.Add(this.sendMsgBtn);
            this.sendMsgBox.Controls.Add(this.sendMsgTxt);
            this.sendMsgBox.Location = new System.Drawing.Point(13, 357);
            this.sendMsgBox.Name = "sendMsgBox";
            this.sendMsgBox.Size = new System.Drawing.Size(629, 53);
            this.sendMsgBox.TabIndex = 2;
            this.sendMsgBox.TabStop = false;
            this.sendMsgBox.Text = "Type your message here";
            // 
            // sendMsgBtn
            // 
            this.sendMsgBtn.Location = new System.Drawing.Point(520, 21);
            this.sendMsgBtn.Name = "sendMsgBtn";
            this.sendMsgBtn.Size = new System.Drawing.Size(103, 23);
            this.sendMsgBtn.TabIndex = 1;
            this.sendMsgBtn.Text = "Send";
            this.sendMsgBtn.UseVisualStyleBackColor = true;
            this.sendMsgBtn.Click += new System.EventHandler(this.sendMsgBtn_Click);
            // 
            // sendMsgTxt
            // 
            this.sendMsgTxt.Location = new System.Drawing.Point(7, 22);
            this.sendMsgTxt.Name = "sendMsgTxt";
            this.sendMsgTxt.Size = new System.Drawing.Size(507, 22);
            this.sendMsgTxt.TabIndex = 0;
            // 
            // convoBox
            // 
            this.convoBox.Controls.Add(this.convoTxtBox);
            this.convoBox.Location = new System.Drawing.Point(13, 417);
            this.convoBox.Name = "convoBox";
            this.convoBox.Size = new System.Drawing.Size(629, 196);
            this.convoBox.TabIndex = 3;
            this.convoBox.TabStop = false;
            this.convoBox.Text = "Conversation";
            // 
            // convoTxtBox
            // 
            this.convoTxtBox.Location = new System.Drawing.Point(7, 22);
            this.convoTxtBox.Name = "convoTxtBox";
            this.convoTxtBox.ReadOnly = true;
            this.convoTxtBox.Size = new System.Drawing.Size(616, 168);
            this.convoTxtBox.TabIndex = 0;
            this.convoTxtBox.Text = "";
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(654, 625);
            this.Controls.Add(this.convoBox);
            this.Controls.Add(this.sendMsgBox);
            this.Controls.Add(this.chatFormPic);
            this.Controls.Add(this.chatFormMenu);
            this.MainMenuStrip = this.chatFormMenu;
            this.Name = "Form1";
            this.Text = "Form1";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.Form1_FormClosing);
            this.chatFormMenu.ResumeLayout(false);
            this.chatFormMenu.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.chatFormPic)).EndInit();
            this.sendMsgBox.ResumeLayout(false);
            this.sendMsgBox.PerformLayout();
            this.convoBox.ResumeLayout(false);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.MenuStrip chatFormMenu;
        private System.Windows.Forms.ToolStripMenuItem gameToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem exitToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem networkToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem connectToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem disconnectToolStripMenuItem;
        private System.Windows.Forms.PictureBox chatFormPic;
        private System.Windows.Forms.GroupBox sendMsgBox;
        private System.Windows.Forms.Button sendMsgBtn;
        private System.Windows.Forms.TextBox sendMsgTxt;
        private System.Windows.Forms.GroupBox convoBox;
        private System.Windows.Forms.RichTextBox convoTxtBox;
    }
}

