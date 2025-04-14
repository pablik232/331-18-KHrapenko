package com.example.calendar.other_pages

import android.content.Intent
import android.os.Bundle
import androidx.viewpager2.widget.ViewPager2
import com.example.calendar.BaseActivity
import com.example.calendar.R
import com.example.calendar.adapters.ImageSliderAdapter
import com.google.android.material.bottomnavigation.BottomNavigationView
import java.util.*

class HomeActivity : BaseActivity() {
    private lateinit var foundSlider: ViewPager2
    private lateinit var eventSlider: ViewPager2
    private lateinit var nearbySlider: ViewPager2

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_home)

        // Инициализация ViewPager2
        foundSlider = findViewById(R.id.found_for_you_slider)
        eventSlider = findViewById(R.id.events_slider)
        nearbySlider = findViewById(R.id.nearby_places_slider)

        val foundImages = listOf(R.drawable.ic_launcher_foreground, R.drawable.ic_launcher_background)
        val eventImages = listOf(R.drawable.ic_launcher_foreground, R.drawable.ic_launcher_background,)
        val nearbyImages = listOf(R.drawable.ic_launcher_foreground, R.drawable.ic_launcher_background,)

        foundSlider.adapter = ImageSliderAdapter(this, foundImages)
        eventSlider.adapter = ImageSliderAdapter(this, eventImages)
        nearbySlider.adapter = ImageSliderAdapter(this, nearbyImages)

        startAutoScroll(foundSlider, foundImages)
        startAutoScroll(eventSlider, eventImages)
        startAutoScroll(nearbySlider, nearbyImages)

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
    }

    private fun startAutoScroll(viewPager: ViewPager2, imageList: List<Int>) {
        val timer = Timer()
        timer.schedule(object : TimerTask() {
            override fun run() {
                runOnUiThread {
                    val nextItem = (viewPager.currentItem + 1) % imageList.size
                    viewPager.setCurrentItem(nextItem, true)
                }
            }
        }, 6000, 6000)
    }
}