# What is a Domain Name? What is a Hosting Provider? Do we need both of them to host a website online?
1. A **domain** is a human readable name provided to a website, which elemenates the need to rename the IP. Basically it's a human readable namespace.
2. Whenever a user sends requst to any domain it's sent to DNS servers to resolve the IP address, and later cached at different levels.
3. A web hosting provider is a company that enables businesses and individuals to make their websites available through the World Wide Web. The services that web hosting providers offer will vary but usually include website design, storage space on a host, and connectivity to the Internet.
4. In order to deploy any website, both are necessary for users convinience
5. Domain name makes it easier to find, and remeber, while hosting provider makes sure your website is live.

# What is the 'Absolute URI'? How is it different from the 'Relative URI'?
1. Absolute URI provides full path of resource, like http://...
2. A relative URI provides, relative path with respect to current URL


# What is a command line interface? Explain briefly about the commands you tried and the purpose of those commands.
1. A command-line interface (CLI) is a text-based interface used to interact with a computer system or program by typing commands.

command | function | flags
--- | --- | ---
ls  | lists the files in current directory | -a (lists hidden files too)
cd `<dirname>` |  changes directory to desired directory |
mkdir `<dirname>` | creates directory in current folder |
rm `<dirname>`| removes the directory | `-rf` removes all the subdirectories
grep `options` pattern `files` | The grep filter searches a file for a particular pattern of characters and displays all lines that contain that pattern. |


# What is the difference between Bash, Zsh, & NPM?
1. Bash, Zsh are unix shell environments
2. NPM (Node Package Manager) is a package manager for JavaScript, used primarily for managing dependencies in Node.js projects.

# Can we install node with npm?
No, npm is used to manage Node.js packages, but it does not install Node.js itself. Node.js needs to be installed separately from its official website or through a package managers.

# What is ~/.bashrc or ~/.zshrc?
1. ~/.bashrc and ~/.zshrc are configuration files for the Bash and Zsh shells, respectively. They are typically located in the user's home directory (~) and are used to customize the shell environment by setting environment variables, defining aliases, and configuring shell behavior.
2. We can add / update custom paths variables in those files

# Which design pattern do you already know? How does it help in coding?
1. MVC is a design pattern that separates an application into three main components: the model, the view, and the controller. 
2. This separation allows for better code organization and the ability to make changes to the application without affecting other parts of the code.