# SEO: 21st May #219
## 1. What is the purpose of robots.txt? Can we completely rely on robots.txt for its purpose?
1. The `robots.txt` file is used to manage and control the behavior of web crawlers (bots) when they visit your site. It specifies which parts of the site should be crawled and indexed by search engines and which should not.
2. While most legitimate search engines (like Google, Bing) respect the directives in `robots.txt`, it is not enforceable. Malicious bots or scrapers may ignore it entirely.
3. Sensitive information should not be protected by `robots.txt` alone. It should be secured through proper authentication and access control methods.
## 2. What is crawling? What is indexing?
### Crawling:
Crawling is the process by which search engines discover new and updated pages on the web. Search engines use crawlers (also known as spiders or bots) to follow links on the web and download the content of pages.
### Indexing
Indexing is the process of analyzing and storing the data collected during crawling. Once a page is crawled, its content is processed and added to the search engine’s index.

## 3. What are the different types of sitemaps? Explain each in brief.
1. **XML Sitemaps**:
	1. **Purpose**: Helps search engines find and understand the structure of a website.
	2. **Example**:
		```xml
		<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
		  <url>
		    <loc>https://www.example.com/page1</loc>
		    <lastmod>2024-01-01</lastmod>
		    <changefreq>monthly</changefreq>
		    <priority>0.8</priority>
		  </url>
		</urlset>
		```
        
2. **HTML Sitemaps**:
	1. **Purpose**: Provides a list of pages for users, improving navigation and user experience.
	2. **Example**:
		```html
		<ul>
		  <li><a href="/page1">Page 1</a></li>
		  <li><a href="/page2">Page 2</a></li>
		</ul>
		```
## 4. Why do we need to split a sitemap (why is it required)? How to split a sitemap?
### Reasons for Splitting a Sitemap:
- **Size Limit**: A single sitemap file is limited to 50MB (uncompressed) and 50,000 URLs.
- **Improved Crawling**: Large sites benefit from splitting sitemaps to ensure efficient and complete crawling by search engines.
### How to Split:
1. **Divide URLs**: Divide your website's URLs into multiple sitemap files, ensuring each file contains no more than 50,000 URLs.
2. **Create a Sitemap Index File**: Create an XML sitemap index file that references each individual sitemap.
## 5. What does the priority value define for each sitemap location?
1. The priority value in a sitemap indicates the relative importance of a URL compared to other URLs on the same site.
2. Values range from 0.0 to 1.0, where 1.0 is the highest priority.


cc @abhishekfdd


1. **Create a FSE website using the site editor only, that contains the following**
    1. A Blogs page to display all the articles
        1. Create the template for the page
        2. Create the template parts necessary to create the page
    2. A single article page
        1. Create the template for the page
        2. Create the template parts necessary to create the page
    3. A navigation menu with links to the pages
        1. Use the navigation block
    4. A header
        1. Create using the blocks
    5. A footer
        1. Create using the blocks