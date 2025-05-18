import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
 
Livewire.start()

import './bootstrap';


// Import Chart.js
import { Chart } from 'chart.js';

// Import flatpickr
import flatpickr from 'flatpickr';

// import component from './components/component';
import dashboardCard01 from './components/dashboard-card-01';
import dashboardCard02 from './components/dashboard-card-02';
import dashboardCard03 from './components/dashboard-card-03';
import dashboardCard04 from './components/dashboard-card-04';
import dashboardCard05 from './components/dashboard-card-05';
import dashboardCard06 from './components/dashboard-card-06';
import dashboardCard08 from './components/dashboard-card-08';
import dashboardCard09 from './components/dashboard-card-09';
import dashboardCard11 from './components/dashboard-card-11';

// Define Chart.js default settings
/* eslint-disable prefer-destructuring */
Chart.defaults.font.family = '"Inter", sans-serif';
Chart.defaults.font.weight = 500;
Chart.defaults.plugins.tooltip.borderWidth = 1;
Chart.defaults.plugins.tooltip.displayColors = false;
Chart.defaults.plugins.tooltip.mode = 'nearest';
Chart.defaults.plugins.tooltip.intersect = false;
Chart.defaults.plugins.tooltip.position = 'nearest';
Chart.defaults.plugins.tooltip.caretSize = 0;
Chart.defaults.plugins.tooltip.caretPadding = 20;
Chart.defaults.plugins.tooltip.cornerRadius = 8;
Chart.defaults.plugins.tooltip.padding = 8;

// Function that generates a gradient for line charts
export const chartAreaGradient = (ctx, chartArea, colorStops) => {
  if (!ctx || !chartArea || !colorStops || colorStops.length === 0) {
    return 'transparent';
  }
  const gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
  colorStops.forEach(({ stop, color }) => {
    gradient.addColorStop(stop, color);
  });
  return gradient;
};

// Register Chart.js plugin to add a bg option for chart area
Chart.register({
  id: 'chartAreaPlugin',
  // eslint-disable-next-line object-shorthand
  beforeDraw: (chart) => {
    if (chart.config.options.chartArea && chart.config.options.chartArea.backgroundColor) {
      const ctx = chart.canvas.getContext('2d');
      const { chartArea } = chart;
      ctx.save();
      ctx.fillStyle = chart.config.options.chartArea.backgroundColor;
      // eslint-disable-next-line max-len
      ctx.fillRect(chartArea.left, chartArea.top, chartArea.right - chartArea.left, chartArea.bottom - chartArea.top);
      ctx.restore();
    }
  },
});

document.addEventListener('DOMContentLoaded', () => {
  // Light switcher
  const lightSwitches = document.querySelectorAll('.light-switch');
  if (lightSwitches.length > 0) {
    lightSwitches.forEach((lightSwitch, i) => {
      if (localStorage.getItem('dark-mode') === 'true') {
        lightSwitch.checked = true;
      }
      lightSwitch.addEventListener('change', () => {
        const { checked } = lightSwitch;
        lightSwitches.forEach((el, n) => {
          if (n !== i) {
            el.checked = checked;
          }
        });
        document.documentElement.classList.add('**:transition-none!');
        if (lightSwitch.checked) {
          document.documentElement.classList.add('dark');
          document.querySelector('html').style.colorScheme = 'dark';
          localStorage.setItem('dark-mode', true);
          document.dispatchEvent(new CustomEvent('darkMode', { detail: { mode: 'on' } }));
        } else {
          document.documentElement.classList.remove('dark');
          document.querySelector('html').style.colorScheme = 'light';
          localStorage.setItem('dark-mode', false);
          document.dispatchEvent(new CustomEvent('darkMode', { detail: { mode: 'off' } }));
        }
        setTimeout(() => {
          document.documentElement.classList.remove('**:transition-none!');
        }, 1);
      });
    });
  }
  // Flatpickr
  flatpickr('.datepicker', {
    mode: 'range',
    static: true,
    monthSelectorType: 'static',
    dateFormat: 'M j, Y',
    defaultDate: [new Date().setDate(new Date().getDate() - 6), new Date()],
    prevArrow: '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M5.4 10.8l1.4-1.4-4-4 4-4L5.4 0 0 5.4z" /></svg>',
    nextArrow: '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M1.4 10.8L0 9.4l4-4-4-4L1.4 0l5.4 5.4z" /></svg>',
    onReady: (selectedDates, dateStr, instance) => {
      // eslint-disable-next-line no-param-reassign
      instance.element.value = dateStr.replace('to', '-');
      const customClass = instance.element.getAttribute('data-class');
      instance.calendarContainer.classList.add(customClass);
    },
    onChange: (selectedDates, dateStr, instance) => {
      // eslint-disable-next-line no-param-reassign
      instance.element.value = dateStr.replace('to', '-');
    },
  });
  dashboardCard01();
  dashboardCard02();
  dashboardCard03();
  dashboardCard04();
  dashboardCard05();
  dashboardCard06();
  dashboardCard08();
  dashboardCard09();
  dashboardCard11();
});

            // Initialize Feather icons
            feather.replace()

            // Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button')
            const mobileMenu = document.getElementById('mobile-menu')

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden')
            })

            // Carousel Functionality
            const carousel = document.getElementById('carousel')
            const carouselItems = document.querySelectorAll('.carousel-item')
            const prevBtn = document.getElementById('prevBtn')
            const nextBtn = document.getElementById('nextBtn')
            const indicators = document.querySelectorAll('.carousel-indicator')

            let currentIndex = 0
            const totalItems = carouselItems.length

            // Auto slide functionality
            let autoSlideInterval

            function startAutoSlide() {
                autoSlideInterval = setInterval(() => {
                    goToSlide((currentIndex + 1) % totalItems)
                }, 5000) // Change slide every 5 seconds
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval)
            }

            function goToSlide(index) {
                currentIndex = index
                carousel.style.transform = `translateX(-${currentIndex * 100}%)`

                // Update indicators
                indicators.forEach((indicator, i) => {
                    if (i === currentIndex) {
                        indicator.classList.remove('bg-gray-300')
                        indicator.classList.add('bg-primary')
                        indicator.classList.add('opacity-100')
                    } else {
                        indicator.classList.remove('bg-primary')
                        indicator.classList.remove('opacity-100')
                        indicator.classList.add('bg-gray-300')
                    }
                })
            }

            prevBtn.addEventListener('click', () => {
                stopAutoSlide()
                goToSlide((currentIndex - 1 + totalItems) % totalItems)
                startAutoSlide()
            })

            nextBtn.addEventListener('click', () => {
                stopAutoSlide()
                goToSlide((currentIndex + 1) % totalItems)
                startAutoSlide()
            })

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    stopAutoSlide()
                    goToSlide(index)
                    startAutoSlide()
                })
            })

            // Start auto slide on page load
            startAutoSlide()

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault()

                    const targetId = this.getAttribute('href')
                    if (targetId === '#') return

                    const targetElement = document.querySelector(targetId)
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80, // Adjust for navbar height
                            behavior: 'smooth',
                        })

                        // Close mobile menu if open
                        if (!mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.add('hidden')
                        }
                    }
                })
            })
