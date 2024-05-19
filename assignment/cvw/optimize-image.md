# Audit For [Site ](https://mulberry-platinum-stingray.glitch.me/)
Link to [report](https://pagespeed.web.dev/analysis/https-mulberry-platinum-stingray-glitch-me/2x586557rm) before optimisation.

# Performance
### Metrics
#### Mobile
**Specifications**
- Captured at May 14, 2024, 11:56 AM GMT+5:30
- Emulated Moto G Power with Lighthouse 12.0.0
- Single page session
- Initial page load
- Slow 4G throttling
- Using HeadlessChromium 124.0.6367.118 with lr

**Results**

| METRICS                  | Value    | Remarks |
| ------------------------ | -------- | ------- |
| First Contentful Paint   | 2.1 s    | Poor    |
| Largest Contentful Paint | 2.6 s    | Poor    |
| Total Blocking Time      | 3,010 ms | Poor    |
| Cumulative Layout Shift  | 0.02     | Good    |
| Speed Index              | 6.1 s    | Slow    |

#### Desktop
**Specifications**
- Captured at May 14, 2024, 11:56 AM GMT+5:30
- Emulated Desktop with Lighthouse 12.0.0
- Single page session
- Initial page load
- Custom throttling
- Using HeadlessChromium 124.0.6367.118 with lr

**Results**

| METRICS                  | Value  | Remarks           |
| ------------------------ | ------ | ----------------- |
| First Contentful Paint   | 0.5 s  | Good              |
| Largest Contentful Paint | 1.2 s  | Good              |
| Total Blocking Time      | 520 ms | Poor              |
| Cumulative Layout Shift  | 0.104  | Needs Improvement |
| Speed Index              | 2.3 s  | Needs Improvement |

### Issues found
1. No fixed width is provided resulting in high CLS value
2. `https://surlybikes.com/uploads/bikes/big_dummy2.jpg` is not optimized for different devices, and format is JPG.
3. For tweets same script is loaded multiple times, and it's not `defer`.
4. `"https://platform.twitter.com/widgets.js"` is loaded multiple time withing the parsing html.

## Changes Made
1. Added script tags just before `</body>` closing tag, and added `defer` attribute while loading script.
2. Removed unnecessary loading of multiple `"https://platform.twitter.com/widgets.js"`.

https://pagespeed.web.dev/analysis/https-mulberry-platinum-stingray-glitch-me/5wzu90yafq?form_factor=mobile


https://pagespeed.web.dev/analysis/https-mulberry-platinum-stingray-glitch-me/2u3nomjtwh?form_factor=desktop

3. Updated the images to webp format
https://pagespeed.web.dev/analysis/https-mulberry-platinum-stingray-glitch-me/z6wre0nwc6?form_factor=desktop

Final Report

https://pagespeed.web.dev/analysis/https-mulberry-platinum-stingray-glitch-me/64jog8775c?form_factor=desktop

Minified the CSS
Score increased from 68% to 87%


# Font Optimisation
