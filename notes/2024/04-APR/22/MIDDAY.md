# Basic React : 22nd April 2024 #177
## 1. What are the different phases of the component lifecycle?
1. **Initialization:** This is when the component is set up, its initial state is defined, and props are received.
2. **Mounting:** The component is rendered for the first time and inserted into the DOM.
3.  **Updating:** This occurs when the component is re-rendered due to changes in props or state.
4. **Unmounting:** The component is removed from the DOM.
5. **Error Handling:** This phase is triggered when an error occurs during rendering, in a lifecycle method, or in the constructor of any child component.
## 2. What is prop drilling in React?
![](https://miro.medium.com/v2/resize:fit:1100/format:webp/1*TRjMRAgIbh1-LgwiOjsNBg.gif)

Prop drilling refers to the process of passing props from a parent component to nested child components through multiple layers of intermediary components. This can lead to complex and cumbersome code, as props need to be passed through each intermediate component, even if they are not directly consumed by those components.

## 3. What are the most common approaches for styling a React application?

1. **CSS Modules:** CSS files where class names are scoped locally by default, preventing conflicts.
2. **Styled Components:** Use JavaScript to style components by creating styled components with tagged template literals.
3. **CSS-in-JS Libraries:** Libraries like Emotion or Styled Components allow you to write CSS directly in your JavaScript files.
4. **Preprocessors:** Use preprocessors like Sass or Less to write more maintainable CSS.
## 4. What are stateless components?
Stateless components, also known as functional components, are components that do not have state. They are defined as plain JavaScript functions that accept props as an argument and return React elements to be rendered.

## 5. What is/are the debug tool/s for ReactJs? Which ones have you used?
- **React Developer Tools:** This browser extension allows you to inspect the React component hierarchy, view component props and state, and monitor component updates.
- **React DevTools Profiler:** This tool helps you analyze the performance of your React application by identifying slow components and rendering bottlenecks.
- **Error Boundary Component:** React provides an Error Boundary component that can catch JavaScript errors anywhere in its child component tree and log them or display a fallback UI.