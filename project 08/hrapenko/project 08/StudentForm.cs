using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text.Json;
using System.Windows.Forms;

namespace StudentManager
{
    
    public partial class StudentForm : Form
    {
        private List<Student> students = new List<Student>();
        private string filePath = "students.json";
        private bool isModified = false; // Флаг изменений

        public StudentForm()
        {
            InitializeComponent();
            LoadStudents();
        }

        private void LoadStudents()
        {
            if (!File.Exists(filePath))
            {
                File.WriteAllText(filePath, "[]"); // Создаём пустой JSON при первом запуске
            }

            string json = File.ReadAllText(filePath);
            students = JsonSerializer.Deserialize<List<Student>>(json) ?? new List<Student>();
            UpdateStudentList();
        }

        private void SaveStudents()
        {
            try
            {
                isModified = false; // Данные считаем сохранёнными перед записью
                string json = JsonSerializer.Serialize(students, new JsonSerializerOptions { WriteIndented = true });
                File.WriteAllText(filePath, json);
            }
            catch (Exception ex)
            {
                MessageBox.Show("Ошибка сохранения данных: " + ex.Message, "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }


        private bool ValidateFields()
        {
            if (string.IsNullOrWhiteSpace(txtLastName.Text) ||
                string.IsNullOrWhiteSpace(txtFirstName.Text) ||
                string.IsNullOrWhiteSpace(txtMiddleName.Text) ||
                string.IsNullOrWhiteSpace(txtCourse.Text) ||
                string.IsNullOrWhiteSpace(txtGroup.Text) ||
                string.IsNullOrWhiteSpace(txtBirthDate.Text) ||
                string.IsNullOrWhiteSpace(txtEmail.Text))
            {
                MessageBox.Show("Заполните все поля!", "Ошибка ввода", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                return false;
            }
            return true;
        }

        private void AddStudent()
        {
            if (!ValidateFields())
                return;

            isModified = true; // Данные были изменены
            var student = new Student
            {
                LastName = txtLastName.Text,
                FirstName = txtFirstName.Text,
                MiddleName = txtMiddleName.Text,
                Course = int.Parse(txtCourse.Text),
                Group = txtGroup.Text,
                BirthDate = DateTime.Parse(txtBirthDate.Text),
                Email = txtEmail.Text
            };

            students.Add(student);
            SaveStudents();
            UpdateStudentList();
            ClearFields();
        }


        private void DeleteStudent()
        {
            if (listBoxStudents.SelectedItem is Student selectedStudent)
            {
                students.Remove(selectedStudent);
                isModified = true; // Данные изменены
                SaveStudents();
                UpdateStudentList();
            }
        }

        // Метод обработки закрытия окна
        protected override void OnFormClosing(FormClosingEventArgs e)
        {
            if (isModified)
            {
                DialogResult result = MessageBox.Show(
                    "Вы внесли изменения. Сохранить перед выходом?",
                    "Предупреждение",
                    MessageBoxButtons.YesNoCancel,
                    MessageBoxIcon.Warning);

                if (result == DialogResult.Cancel)
                {
                    e.Cancel = true; // Отменяем закрытие
                }
                else if (result == DialogResult.Yes)
                {
                    SaveStudents(); // Сохраняем данные перед выходом
                }
            } 
            base.OnFormClosing(e);
        }


        private void UpdateStudentList()
        {
            listBoxStudents.Items.Clear();
            listBoxStudents.Items.AddRange(students.ToArray());
        }
        
        private void ClearFields()
        {
            txtLastName.Text = "";
            txtFirstName.Text = "";
            txtMiddleName.Text = "";
            txtCourse.Text = "";
            txtGroup.Text = "";
            txtBirthDate.Text = "";
            txtEmail.Text = "";
        }
        
        private void SortStudents(string criteria)
        {
            switch (criteria)
            {
                case "Фамилия":
                    students = students.OrderBy(s => s.LastName).ToList();
                    break;
                case "Группа":
                    students = students.OrderBy(s => s.Group).ToList();
                    break;
                case "Курс":
                    students = students.OrderBy(s => s.Course).ToList();
                    break;
            }

            UpdateStudentList();
        }
        
        private void FilterStudents(string searchText)
        {
            var filteredStudents = students;

            if (int.TryParse(searchText, out int course))
            {
                // Если введено число, фильтруем по курсу
                filteredStudents = students.Where(s => s.Course == course).ToList();
            }
            else if (students.Any(s => s.Group.Equals(searchText, StringComparison.OrdinalIgnoreCase)))
            {
                // Если введён текст, совпадающий с группой, фильтруем по группе
                filteredStudents = students.Where(s => s.Group.Equals(searchText, StringComparison.OrdinalIgnoreCase)).ToList();
            }
            else
            {
                // В остальных случаях ищем по фамилии
                filteredStudents = students.Where(s => s.LastName.StartsWith(searchText, StringComparison.OrdinalIgnoreCase)).ToList();
            }

            listBoxStudents.Items.Clear();
            listBoxStudents.Items.AddRange(filteredStudents.ToArray());
        }
        
        private void ExportToCsv(string filePath)
        {
            try
            {
                using (StreamWriter writer = new StreamWriter(filePath))
                {
                    // Заголовки столбцов
                    writer.WriteLine("Фамилия,Имя,Отчество,Курс,Группа,Дата рождения,Email");

                    // Запись данных студентов
                    foreach (var student in students)
                    {
                        writer.WriteLine($"{student.LastName},{student.FirstName},{student.MiddleName},{student.Course},{student.Group},{student.BirthDate:dd.MM.yyyy},{student.Email}");
                    }
                }

                MessageBox.Show("Данные успешно экспортированы!", "Успех", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }
            catch (Exception ex)
            {
                MessageBox.Show("Ошибка экспорта: " + ex.Message, "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
        private void ImportFromCsv(string filePath)
        {
            try
            {
                using (StreamReader reader = new StreamReader(filePath))
                {
                    // Пропускаем заголовок
                    reader.ReadLine();

                    while (!reader.EndOfStream)
                    {
                        var line = reader.ReadLine();
                        var values = line.Split(',');

                        var student = new Student
                        {
                            LastName = values[0],
                            FirstName = values[1],
                            MiddleName = values[2],
                            Course = int.Parse(values[3]),
                            Group = values[4],
                            BirthDate = DateTime.ParseExact(values[5], "dd.MM.yyyy", null),
                            Email = values[6]
                        };

                        students.Add(student);
                    }
                }

                UpdateStudentList();
                SaveStudents();
                MessageBox.Show("Данные успешно импортированы!", "Успех", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }
            catch (Exception ex)
            {
                MessageBox.Show("Ошибка импорта: " + ex.Message, "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }


    }
}
