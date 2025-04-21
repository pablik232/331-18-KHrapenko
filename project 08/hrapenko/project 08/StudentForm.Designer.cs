namespace StudentManager
{
    partial class StudentForm
    {
        private System.Windows.Forms.ListBox listBoxStudents;
        private System.Windows.Forms.Label lblLastName, lblFirstName, lblMiddleName, lblCourse, lblGroup, lblBirthDate, lblEmail;
        private System.Windows.Forms.TextBox txtLastName, txtFirstName, txtMiddleName, txtCourse, txtGroup, txtBirthDate, txtEmail;
        private System.Windows.Forms.Button btnAdd, btnDelete;
        private System.Windows.Forms.TextBox txtSearch;
        private System.Windows.Forms.Button btnSearch, btnReset;
        private System.Windows.Forms.ComboBox cmbSort;
        private System.Windows.Forms.Button btnSort;
        private System.Windows.Forms.Button btnFileOptions;
        private System.Windows.Forms.ContextMenuStrip menuFileOptions;

        private void InitializeComponent()
        {
            this.listBoxStudents = new System.Windows.Forms.ListBox();
            this.listBoxStudents.Location = new System.Drawing.Point(20, 20);
            this.listBoxStudents.Size = new System.Drawing.Size(580, 180);
            this.listBoxStudents.HorizontalScrollbar = true;

            this.lblLastName = new System.Windows.Forms.Label() { Text = "Фамилия:", Location = new System.Drawing.Point(20, 220) };
            this.lblFirstName = new System.Windows.Forms.Label() { Text = "Имя:", Location = new System.Drawing.Point(20, 250) };
            this.lblMiddleName = new System.Windows.Forms.Label() { Text = "Отчество:", Location = new System.Drawing.Point(20, 280) };
            this.lblCourse = new System.Windows.Forms.Label() { Text = "Курс:", Location = new System.Drawing.Point(20, 310) };
            this.lblGroup = new System.Windows.Forms.Label() { Text = "Группа:", Location = new System.Drawing.Point(20, 340) };
            this.lblBirthDate = new System.Windows.Forms.Label() { Text = "Дата рождения:", Location = new System.Drawing.Point(20, 370) };
            this.lblEmail = new System.Windows.Forms.Label() { Text = "Email:", Location = new System.Drawing.Point(20, 400) };

            this.txtLastName = new System.Windows.Forms.TextBox() { Location = new System.Drawing.Point(140, 220) };
            this.txtFirstName = new System.Windows.Forms.TextBox() { Location = new System.Drawing.Point(140, 250) };
            this.txtMiddleName = new System.Windows.Forms.TextBox() { Location = new System.Drawing.Point(140, 280) };
            this.txtCourse = new System.Windows.Forms.TextBox() { Location = new System.Drawing.Point(140, 310) };
            this.txtGroup = new System.Windows.Forms.TextBox() { Location = new System.Drawing.Point(140, 340) };
            this.txtBirthDate = new System.Windows.Forms.TextBox() { Location = new System.Drawing.Point(140, 370) };
            this.txtEmail = new System.Windows.Forms.TextBox() { Location = new System.Drawing.Point(140, 400) };

            this.btnAdd = new System.Windows.Forms.Button() { Text = "Добавить", Location = new System.Drawing.Point(20, 440), Size = new System.Drawing.Size(120, 40) };
            this.btnAdd.Click += (sender, e) => AddStudent();

            this.btnDelete = new System.Windows.Forms.Button() { Text = "Удалить", Location = new System.Drawing.Point(160, 440), Size = new System.Drawing.Size(120, 40) };
            this.btnDelete.Click += (sender, e) => DeleteStudent();

            this.cmbSort = new System.Windows.Forms.ComboBox();
            this.cmbSort.Items.AddRange(new string[] { "Фамилия", "Группа", "Курс" });
            this.cmbSort.Location = new System.Drawing.Point(350, 220);
            this.cmbSort.Size = new System.Drawing.Size(180, 25);
            this.cmbSort.SelectedIndex = 0;

            this.btnSort = new System.Windows.Forms.Button() { Text = "Сортировать", Location = new System.Drawing.Point(350, 260), Size = new System.Drawing.Size(180, 40) };
            this.btnSort.Click += (sender, e) => SortStudents(cmbSort.SelectedItem.ToString());

            this.txtSearch = new System.Windows.Forms.TextBox() { Location = new System.Drawing.Point(20, 480), Size = new System.Drawing.Size(250, 25), PlaceholderText = "Введите фамилию, курс или группу" };

            this.btnSearch = new System.Windows.Forms.Button() { Text = "Поиск", Location = new System.Drawing.Point(280, 480), Size = new System.Drawing.Size(120, 30) };
            this.btnSearch.Click += (sender, e) => FilterStudents(txtSearch.Text);

            this.btnReset = new System.Windows.Forms.Button() { Text = "Сброс", Location = new System.Drawing.Point(420, 480), Size = new System.Drawing.Size(120, 30) };
            this.btnReset.Click += (sender, e) => UpdateStudentList();

            this.btnFileOptions = new System.Windows.Forms.Button() { Text = "Данные", Location = new System.Drawing.Point(20, 520), Size = new System.Drawing.Size(120, 30) };
            this.menuFileOptions = new System.Windows.Forms.ContextMenuStrip();
            this.menuFileOptions.Items.Add("Экспорт CSV", null, (sender, e) => ExportToCsv("students.csv"));
            this.menuFileOptions.Items.Add("Импорт CSV", null, (sender, e) => ImportFromCsv("students.csv"));
            this.btnFileOptions.Click += (sender, e) => menuFileOptions.Show(btnFileOptions, new System.Drawing.Point(0, btnFileOptions.Height));

            // **Добавление элементов на форму**
            this.Controls.AddRange(new System.Windows.Forms.Control[]
            {
                listBoxStudents, lblLastName, lblFirstName, lblMiddleName, lblCourse, lblGroup, lblBirthDate, lblEmail,
                txtLastName, txtFirstName, txtMiddleName, txtCourse, txtGroup, txtBirthDate, txtEmail,
                btnAdd, btnDelete, cmbSort, btnSort, txtSearch, btnSearch, btnReset, btnFileOptions
            });
        }
    }
}
