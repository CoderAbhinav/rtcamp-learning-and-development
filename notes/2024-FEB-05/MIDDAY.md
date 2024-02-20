Please go through the questions below and answer in the thread. Ensure to tag your pod leader.

# 1. Write CSS to:
    a) Italicize all the headings and convert them to lowercase (Hello World -> hello world).
    b) On mobile devices (width <= 480px), change the paragraph font size to 12px.
    c) All the anchors should have a dotted underline on hover.

**code:**

    ```css
    /* a) Italicize all headings and convert to lowercase */
            h1, h2, h3, h4, h5, h6 {
                font-style: italic;
                text-transform: lowercase;
            }

            /* b) On mobile devices, change paragraph font size to 12px */
            @media (max-width: 480px) {
                p {
                    font-size: 12px;
                }
            }

            /*  Anchors with dotted underline on hover */
            a:hover {
                text-decoration: underline dotted;
            }
    ```
# 2. Write CSS to:
    a) Select a paragraph which is the direct descendant of a div with class-name is-mast.
    b) Select all the span which have an h3 tag directly adjacent to them.

**code:**

```css
/* a) Select a paragraph which is the direct descendant of a div with class-name is-mast */
div.is-mast > p {

}

/* b) Select all spans with h3 tag directly adjacent */
span + h3 {

}

```

# 3. What is the difference between + and ~ combinators in CSS? Illustrate using an example.
1. The `+` combinator selects the element that is immediately preceded by a specified element.
2. The `~` combinator selects all sibling elements that share the same parent as the specified element and appear after it.

# 4. Is it possible to access use data attributes in CSS? How?
1. Yes, it is possible
    ```html
    <article
        id="electric-cars"
        data-columns="3"
        data-index-number="12314"
        data-parent="cars">
        …
        </article>
    ```

    in order to display data-parent
    ```css
    article::before {
        content: attr(data-parent);
    }
    ```

    