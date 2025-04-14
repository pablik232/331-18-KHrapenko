package com.example.calendar.other_pages

import android.content.Intent
import android.content.SharedPreferences
import android.os.Bundle
import android.widget.Button
import com.example.calendar.BaseActivity
import com.example.calendar.MainActivity
import com.example.calendar.R
import com.google.android.material.bottomnavigation.BottomNavigationView

class ProfileActivity : BaseActivity() {

    private lateinit var logoutButton: Button
    private lateinit var sharedPreferences: SharedPreferences

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_profile)

        val bottomNavigationView = findViewById<BottomNavigationView>(R.id.bottom_navigation)

        bottomNavigationView.setOnItemSelectedListener { item ->
            when (item.itemId) {
                R.id.nav_home -> {
                    startActivity(Intent(this, HomeActivity::class.java))
                    true
                }
                R.id.nav_date -> {
                    startActivity(Intent(this, PlacesActivity::class.java))
                    true
                }
                R.id.nav_profile -> {
                    startActivity(Intent(this, ProfileActivity::class.java))
                    true
                }
                else -> false
            }
        }

        logoutButton = findViewById(R.id.logout_button)
        sharedPreferences = getSharedPreferences("UserSession", MODE_PRIVATE)

        logoutButton.setOnClickListener {
            logoutUser()
        }
    }

    private fun logoutUser() {
        // Очищаем сохранённые данные и выходим из аккаунта
        sharedPreferences.edit().apply {
            putBoolean("loggedIn", false)
            remove("email")
            apply()
        }

        startActivity(Intent(this, MainActivity::class.java))
        finish()
    }
}
