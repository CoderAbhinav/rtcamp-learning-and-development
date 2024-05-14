# Core Web Vitals : 9th May 2024 #202
## 1. What is above-the-fold content?
1. Above-the-fold content refers to the portion of a web page that is visible without scrolling when the page first loads.
2. It typically includes the header, hero section, and other key content elements that appear immediately to users upon visiting the page.
## 2. What is the difference between defer vs async in the script tag?
1. Both `defer` and `async` are attributes used in the `<script>` tag to control the loading and execution of JavaScript files.
2. `defer`: The script will be downloaded in parallel with the HTML document, but the execution will be deferred until the HTML parsing is complete. Multiple `defer` scripts will execute in the order they appear in the document.
3. `async`: The script will be downloaded asynchronously while the HTML parsing continues. Once the script is downloaded, it will be executed immediately, potentially interrupting the HTML parsing. Scripts with `async` may execute in any order relative to each other and the HTML document.
## 3. Should we apply lazy loading to all images on a web page?
1. Lazy loading should be applied to images that are not initially visible in the viewport when the page loads.
2. This helps reduce initial page load times by deferring the loading of images until they are needed, such as when the user scrolls down the page and the images come into view.
## 4. Does WordPress by default lazy load images or not?
1. As of WordPress version 5.5, images are lazy-loaded by default using the `loading="lazy"` attribute.
2. This feature helps improve performance by loading images only when they are about to come into view, reducing the initial page load time.
## 5. What is the difference between FCP and LCP?
1. FCP (First Contentful Paint) measures the time taken for the browser to render the first piece of content on the screen, such as text or images.
2. LCP (Largest Contentful Paint) measures the time taken for the browser to render the largest piece of content within the viewport, which could be an image, video, or block-level element.
## 6. What is the @ font-face CSS rule? What does its font-display parameter specify?
1. The `@font-face` CSS rule allows developers to specify custom fonts to be downloaded and used in a web page.
2. The `font-display` parameter specifies how the font should be displayed while it is loading. Options include `auto`, `block`, `swap`, `fallback`, and `optional`.
## 7. What is the need for preconnect to the third-party fonts domain? What happens when we preconnect?
1. Preconnecting to a third-party fonts domain establishes an early connection to the domain before the browser requests any resources from it.
2. This helps reduce latency and DNS lookup times when fetching fonts, improving overall page load performance.
## 8. What is the need for crossorigin attribute in the preconnect link tag? What will happen if we don't provide that attribute?
1. The `crossorigin` attribute specifies how crossorigin requests should be handled for the linked resource.
2. If not provided, the browser may treat the resource as same-origin, which could lead to CORS (Cross-Origin Resource Sharing) issues if the resource is served from a different domain.
## 9. Explain the srcset attribute of the image tag and what all optimizations happen when we use that?
1. The `srcset` attribute allows developers to provide multiple image sources and their corresponding sizes, resolutions, or pixel densities.
2. Browsers use this information to choose the most appropriate image source based on device characteristics such as screen size and pixel density, optimizing image loading and display.
## 10. Is the src attribute useless when we use srcset attribute?
1. The `src` attribute serves as a fallback for browsers that do not support the `srcset` attribute or when none of the sources in the `srcset` are suitable for the device.
2. While the `srcset` attribute provides more flexibility for responsive images, the `src` attribute remains useful for compatibility and fallback purposes.
## 11. Suppose you are animating the heading of your page(above-the-fold), to appear from the top to its actual place. So, does this cause CLS issues? And if yes then should we not at all give animations in our above-the-fold content?
1. Animations in above-the-fold content can potentially cause Cumulative Layout Shift (CLS) issues if they cause elements to move or resize after they have been displayed.
2. To minimize CLS, animations should be carefully designed to avoid sudden layout shifts, or they should be deferred until after the initial paint to prevent interference with content rendering.
## 12. When you are checking a site using lighthouse why should you undock your inspector dock into a separate window?
1. Undocking the Inspector Dock into a separate window when using Lighthouse allows for better visibility and easier navigation of the performance metrics and diagnostic information provided by Lighthouse.
2. This separation allows developers to focus on analyzing the performance data without obstruction from the browser interface.