package com.example.calendar

import android.content.Intent
import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import com.example.calendar.other_pages.HomeActivity
import com.example.calendar.other_pages.PlacesActivity
import com.example.calendar.other_pages.ProfileActivity
import com.google.android.material.bottomnavigation.BottomNavigationView

open class BaseActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_base)

        val bottomNavigationView = findViewById<BottomNavigationView>(R.id.bottom_navigation)

        bottomNavigationView.setOnItemSelectedListener { item ->
            when (item.itemId) {
                R.id.nav_home -> {
                    if (this !is HomeActivity) startActivity(Intent(this, HomeActivity::class.java))
                    true
                }
                R.id.nav_date -> {
                    if (this !is PlacesActivity) startActivity(Intent(this, PlacesActivity::class.java))
                    true
                }
                R.id.nav_profile -> {
                    if (this !is ProfileActivity) startActivity(Intent(this, ProfileActivity::class.java))
                    true
                }
                else -> false
            }
        }
    }
}
