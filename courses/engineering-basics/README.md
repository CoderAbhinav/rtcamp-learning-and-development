# Engineering Basics

## Setting Up Development Environment

- Larvel Valet (Installation left at PHP Installation)
- Installing LocalWP for now


### Installing PHPCS
- I have a change suggested so should change the name `master` to `main` in the 

```bash
git clone -b master https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards.git wpcs
git clone -b master https://github.com/Automattic/VIP-Coding-Standards.git
```

changed to

```bash
git clone -b main https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards.git wpcs
git clone -b main https://github.com/Automattic/VIP-Coding-Standards.git
```


- Important to remember
    ```bash
    sudo phpcs --config-set installed_paths ${PWD}/wpcs
    ```

### Introduction To Git & SVN
- Git is **distributed** vs SVN which is **centralised**
- Read [How to write a Git Commit Message](https://cbea.ms/git-commit/)
    - Separate the subject from body by a blank space, subject line should be of less tha `50` characters & a line in the body should be less than `72` characters. ex.
        ```git
        Summarize changes in around 50 characters or less

        More detailed explanatory text, if necessary. Wrap it to about 72
        characters or so. In some contexts, the first line is treated as the
        subject of the commit and the rest of the text as the body. The
        blank line separating the summary from the body is critical (unless
        you omit the body entirely); various tools like `log`, `shortlog`
        and `rebase` can get confused if you run the two together.

        Explain the problem that this commit is solving. Focus on why you
        are making this change as opposed to how (the code explains that).
        Are there side effects or other unintuitive consequences of this
        change? Here's the place to explain them.

        Further paragraphs come after blank lines.

        - Bullet points are okay, too

        - Typically a hyphen or asterisk is used for the bullet, preceded
        by a single space, with blank lines in between, but conventions
        vary here

        If you use an issue tracker, put references to them at the bottom,
        like this:

        Resolves: #123
        See also: #456, #789
        ```
    - It's hard to write a whole commit with body with the `git commit -m "message"` so use a text editor or the interface given by git
    - `git log --oneline` prints only the subject of the commit
    - `git shortlog` groups commits by users, and prints the `subject` only
    - The commit message should be an **imperative** sentence.
    - Body should explain **WHY** rahter than *HOW* .
    - Write the summary line and description of what you have done in the imperative mood, that is as if you were commanding someone. Start the summary with "Fix", "Add", "Change" instead of "Fixed", "Added", "Changed".
- Read [Writing a good commit message](https://github.com/erlang/otp/wiki/writing-good-commit-messages)
- Read [Pushing Code](https://docs.github.com/en/get-started/using-git/pushing-commits-to-a-remote-repository)