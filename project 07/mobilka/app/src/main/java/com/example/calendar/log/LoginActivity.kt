package com.example.calendar.log

import android.content.Intent
import android.content.SharedPreferences
import android.os.Bundle
import android.util.Log
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.calendar.R
import com.example.calendar.database.DBHelper
import com.example.calendar.other_pages.HomeActivity
import okhttp3.*
import okhttp3.MediaType.Companion.toMediaType
import okhttp3.RequestBody.Companion.toRequestBody
import org.json.JSONObject
import java.io.File
import java.io.IOException

class LoginActivity : AppCompatActivity() {

    private lateinit var emailField: EditText
    private lateinit var passwordField: EditText
    private lateinit var loginButton: Button
    private lateinit var sharedPreferences: SharedPreferences
    private lateinit var dbHelper: DBHelper

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)
        dbHelper = DBHelper(this)

        emailField = findViewById(R.id.email)
        passwordField = findViewById(R.id.password)
        loginButton = findViewById(R.id.login_button)
        sharedPreferences = getSharedPreferences("UserSession", MODE_PRIVATE)

        // Проверяем, вошёл ли пользователь ранее
        if (sharedPreferences.getBoolean("loggedIn", false)) {
            startActivity(Intent(this, HomeActivity::class.java))
            finish()
        }

        loginButton.setOnClickListener {
            loginUser()
        }
    }

    private fun loginUser() {
        val email = emailField.text.toString()
        val password = passwordField.text.toString()

        if (email.isEmpty() || password.isEmpty()) {
            Toast.makeText(this, "Заполните все поля!", Toast.LENGTH_SHORT).show()
        } else {
            val loginResult = checkUserLogin(email, password)

            if (loginResult == "Авторизация успешна") {
                Toast.makeText(this, loginResult, Toast.LENGTH_SHORT).show()

                // Сохранение статуса пользователя
                sharedPreferences.edit().apply {
                    putBoolean("loggedIn", true)
                    putString("email", email)
                    apply()
                }

                startActivity(Intent(this, HomeActivity::class.java))
                finish()
            } else {
                Toast.makeText(this, loginResult, Toast.LENGTH_SHORT).show()
            }
        }
    }

    private fun checkUserLogin(email: String, password: String): String {
        val db = dbHelper.readableDatabase
        var result = "Пользователь не найден"

        val cursor = db.rawQuery("SELECT password FROM Users WHERE email = ?", arrayOf(email))

        if (cursor.moveToFirst()) {
            val storedPassword = cursor.getString(0)
            result = if (storedPassword == password) "Авторизация успешна" else "Неправильный пароль"
        }

        cursor.close()
        db.close()

        return result
    }
}