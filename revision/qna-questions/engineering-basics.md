# Questions
1. Can we install `node` with `npm` ? What is `npm` used for ? 
2. Suppose there is a `bash` or `zshrc` file, I made some change to the file, now I don't want to close the terminal, but I want the change to take effect, how to achieve so ? 
3. How to see the list of processes running in the system in **Linux** ?
	1. How to kill any one running process ?
	2. Is it called terminal in *Linux* ? Like in windows you have command prompt what do we have in *Linux* ? 
	3. What does default bash shell of *Linux* is called ?
4. Suppose you are using command line in *macOS* and you want to go to previous directory how to do that ? Is there any other way of doing to other than using `cd` command ?
5. Suppose you have an url, you add it in the browser, and press enter, can you explain the different layers processes happening in this process ?
	1. So every machine has a lookup table ?
	2. What happens in the browser, like what does the server sends to the browser, and then what happens ?
6. Suppose the client has requested something, DNS has been resolved and like what kind of data `facebook.com` will sent to the client, what data & in what format ?
	1. So `HTML` files will be shared in what format ? like `.html` ?
7. What is SSL ? How does it works ? How browser authenticates if it's a genuine site or not ?
8. What are the ports for HTTP, HTTPS ?
9. What are session & cookies ? How are they different ?
10. How to fine IP, DNS address of any public site ? (Expected a terminal command)
11. Why do you need a local development environment ? Do you really need that ?
12. What is VCS ? Explain Git, SVN. 
	1. What is `.gitignore` file ? 
	2. How it works when placed in a sub directory ? 
	3. Is `.gitignore` file available in SVN ?
13. What are closures in JS ?
14. What are `$_SERVER` & `$_GLOBALS` ?
15. What is difference between `block` & `inline` elements in `HTML` ? Any examples ?
16. In `CSS` what is `+` and `~` operator ?


# GPT Answers

### 1. Installing `node` with `npm`

No, you cannot install `node` with `npm`. `npm` is a package manager for JavaScript, which is used to install packages (libraries, tools, frameworks, etc.) that are necessary for JavaScript development. However, `npm` itself comes bundled with `node.js`. To install `node`, you generally use a package manager specific to your operating system (like `brew` for macOS, `apt` for Ubuntu, or `chocolatey` for Windows).

### 2. Applying changes to `.bashrc` or `.zshrc` without closing the terminal

To apply changes made to `.bashrc` or `.zshrc` without closing the terminal, you can use the `source` command:

```bash
source ~/.bashrc  # for bash
source ~/.zshrc   # for zsh
```

### 3. Listing and managing processes in Linux

**3.1. List of processes:**

Use the `ps` command or `top` command to see the list of processes running in the system.

```bash
ps aux    # detailed list of processes
top       # interactive view of running processes
```

**3.2. Killing a process:**

To kill a process, you can use the `kill` command followed by the process ID (PID).

```bash
kill <PID>         # sends SIGTERM signal (polite request to terminate)
kill -9 <PID>      # sends SIGKILL signal (forceful termination)
```

**3.3. Terminal in Linux:**

In Linux, the terminal is often referred to as "Terminal" or "Terminal Emulator." Some popular terminal emulators include `gnome-terminal`, `konsole`, `xterm`, etc.

**3.4. Default bash shell in Linux:**

The default shell in Linux is commonly `bash` (Bourne Again SHell).

### 4. Going to the previous directory in macOS command line

You can use the `cd -` command to go to the previous directory.

```bash
cd -
```

### 5. Process of entering a URL and what happens

**5.1. Lookup Table:**

Every machine does not have a complete DNS lookup table. Instead, it uses DNS resolvers to query and resolve domain names to IP addresses.

**5.2. Browser Process:**

1. **DNS Resolution:** The browser uses a DNS resolver to get the IP address associated with the domain name.
2. **TCP Connection:** The browser establishes a TCP connection with the server at the resolved IP address.
3. **HTTP Request:** The browser sends an HTTP request to the server.
4. **Server Response:** The server responds with the requested resources, typically HTML, CSS, JavaScript files.
5. **Rendering:** The browser renders the page by parsing the HTML and loading stylesheets, scripts, images, etc.

### 6. Data sent by `facebook.com`

**6.1. Format of HTML files:**

HTML files are sent as `.html` files, typically over HTTP/HTTPS protocols, and the content type is `text/html`.

### 7. SSL

SSL (Secure Sockets Layer) is a protocol for establishing encrypted links between a web server and a browser. It ensures that all data passed between the web server and browsers remain private.

**How it works:**

1. **Handshake:** The client and server establish a connection and agree on encryption methods.
2. **Certificate Verification:** The browser verifies the server's SSL certificate.
3. **Encryption:** A secure connection is established using a symmetric session key.

**Browser Authentication:**

The browser uses Certificate Authorities (CAs) to verify the authenticity of the SSL certificate provided by the server.

### 8. Ports for HTTP and HTTPS

- **HTTP:** Port 80
- **HTTPS:** Port 443

### 9. Sessions & Cookies

**Sessions:**

- Server-side storage of user information.
- Typically use session IDs stored in cookies to maintain state.

**Cookies:**

- Client-side storage of small pieces of data.
- Used to maintain state between server and client.

**Difference:**

- Sessions are stored on the server, whereas cookies are stored on the client.

### 10. Finding IP and DNS address of any public site

Use the `nslookup` or `dig` command.

```bash
nslookup example.com
dig example.com
```

### 11. Local Development Environment

A local development environment allows you to develop and test code on your local machine before deploying it to a production server. It is crucial for development as it helps in catching bugs and issues early.

### 12. VCS and Git/SVN

**VCS (Version Control System):**

A tool that helps manage changes to source code over time.

**Git:**

- A distributed version control system.
- Allows multiple developers to work on a project simultaneously.

**SVN (Subversion):**

- A centralized version control system.
- All versions are stored in a central repository.

**.gitignore File:**

- Used to specify files and directories to be ignored by Git.
- When placed in a subdirectory, it only affects that directory and its subdirectories.

**SVN equivalent:**

SVN uses `svn:ignore` properties instead of a `.gitignore` file.

### 13. Closures in JavaScript

A closure is a function that remembers the environment in which it was created. It allows a function to access variables from an outer function even after the outer function has finished executing.

### 14. `$_SERVER` and `$_GLOBALS`

**`$_SERVER`:**

An associative array containing information such as headers, paths, and script locations.

**`$_GLOBALS`:**

An associative array containing all global variables.

### 15. Block & Inline Elements in HTML

**Block Elements:**

- Take up the full width available.
- Start on a new line.
- Examples: `<div>`, `<p>`, `<h1>`

**Inline Elements:**

- Take up only as much width as necessary.
- Do not start on a new line.
- Examples: `<span>`, `<a>`, `<img>`

### 16. CSS `+` and `~` Operators

**`+` Operator:**

- Adjacent sibling combinator.
- Selects the element that is immediately adjacent to the specified element.

```css
h1 + p {
  color: blue;
}
```

**`~` Operator:**

- General sibling combinator.
- Selects all elements that are siblings of the specified element.

```css
h1 ~ p {
  color: green;
}
```