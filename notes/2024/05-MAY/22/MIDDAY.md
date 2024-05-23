# SEO: 22nd May #221
## 1. How to see all the URLs of rtcamp.com indexed by Google (even if you don't have access to the Google Search Console of rtcamp.com)?
You can see the indexed URLs of a site by using a Google search query with the `site:` operator.
### Steps:
1. Open Google Search.
2. Enter `site:rtcamp.com` in the search bar and press Enter.
3. Google will display all the pages from `rtcamp.com` that are indexed.

## 2. What are noindex and nofollow meta tags? Explain each of them and when to use each.

### noindex Meta Tag:

- **Purpose**: The `noindex` meta tag tells search engines not to index a specific page, meaning it won't appear in search engine results.
- **Usage**: Use it when you don't want a page to be searchable, such as admin pages, login pages, or pages under development.
### nofollow Meta Tag:

- **Purpose**: The `nofollow` meta tag tells search engines not to follow the links on a specific page. It prevents passing link equity (PageRank) to the linked pages.
- **Usage**: Use it when you want to prevent search engines from following links, such as user-generated content, paid links, or untrusted content.
## 3. Why React applications will perform bad at SEO? How can you improve this?
### Challenges with React Applications and SEO:

1. **Client-Side Rendering (CSR)**: React applications often use CSR, where the initial HTML served is minimal, and JavaScript builds the content dynamically. Search engine crawlers may have difficulty executing JavaScript and rendering content properly.
2. **Slow Page Loading**: CSR can lead to slower initial page load times, impacting SEO negatively.
## 4. What is structured data? How many ways structured data can be defined?
### Structured Data:

Structured data is a standardized format for providing information about a page and classifying the page content. It helps search engines understand the content and context of a webpage.

### Ways to Define Structured Data:

1. **JSON-LD (JavaScript Object Notation for Linked Data)**:
    - **Usage**: Preferred method by Google.
    - **Example**: 
	```html
	<div itemscope itemtype="https://schema.org/Article">
	  <h1 itemprop="headline">Example Article</h1>
	  <span itemprop="author" itemscope itemtype="https://schema.org/Person">
	    <span itemprop="name">John Doe</span>
	  </span>
	  <time itemprop="datePublished" datetime="2024-05-22">May 22, 2024</time>
	</div>
	```
1. **Microdata**:    
    - **Usage**: Embedding structured data directly into HTML tags.
    - **Example**:
	```html
	<div itemscope itemtype="https://schema.org/Article">
	  <h1 itemprop="headline">Example Article</h1>
	  <span itemprop="author" itemscope itemtype="https://schema.org/Person">
	    <span itemprop="name">John Doe</span>
	  </span>
	  <time itemprop="datePublished" datetime="2024-05-22">May 22, 2024</time>
	</div>
	
	```
## 5. What does the [@type](https://github.com/type) value specify in structured data? Can you specify anything in this value?
### @type Value:

- **Specification**: The `@type` value in structured data specifies the type of entity or object being described. It helps search engines understand the context and category of the data.
	```json
	{
	  "@context": "https://schema.org",
	  "@type": "Person",
	  "name": "John Doe",
	  "jobTitle": "Software Developer",
	  "telephone": "(425) 123-4567",
	  "url": "http://www.example.com"
	}
	```

- **No**. You cannot specify arbitrary values. The `@type` value must correspond to a recognized type defined by a vocabulary such as Schema.org.

cc @abhishekfdd