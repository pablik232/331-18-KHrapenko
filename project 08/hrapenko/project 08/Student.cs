namespace StudentManager
{
    public class Student
    {
        public string LastName { get; set; }
        public string FirstName { get; set; }
        public string MiddleName { get; set; }
        public int Course { get; set; }
        public string Group { get; set; }
        public DateTime BirthDate { get; set; }
        public string Email { get; set; }

        public override string ToString()
        {
            return $"{LastName} {FirstName} ({Course}-й курс, группа {Group})";
        }
    }
}