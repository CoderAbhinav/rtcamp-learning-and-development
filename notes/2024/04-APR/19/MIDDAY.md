# Basic React : 19th April 2024 #176
## 1. What is Context API? How does it work?

1. The Context API is a feature in React that allows you to pass data through the component tree without having to pass props manually at every level. 
2. It provides a way to share values like themes, user authentication status, language preference, etc., to all components in the tree, regardless of how deep they are nested.
3. The Context API consists of two main parts: the `Provider` and the `Consumer`. The `Provider` component allows you to define the data you want to share, while the `Consumer` component allows you to consume that data within your components.

## 2. How to use Context API? Could you explain with a simple example?

Here's a simple example of how to use the Context API:

```jsx
import React, { createContext, useContext } from 'react';

// Create a context with a default value
const ThemeContext = createContext('light');

// Component that provides the context value
const ThemeProvider = ({ children }) => {
  return (
    <ThemeContext.Provider value="dark">
      {children}
    </ThemeContext.Provider>
  );
};

// Component that consumes the context value
const ThemedComponent = () => {
  const theme = useContext(ThemeContext);
  return <div>Current Theme: {theme}</div>;
};

// App component
const App = () => {
  return (
    <ThemeProvider>
      <ThemedComponent />
    </ThemeProvider>
  );
};

export default App;
```

In this example, the `ThemeProvider` component provides the context value "dark" to all its child components. The `ThemedComponent` component consumes this context value using the `useContext` hook and displays it.

## 3. Provide an example of a scenario where using the useMemo() hook can improve the performance of a React application.

One scenario where `useMemo()` can improve performance is when you have a computationally expensive function that is called frequently, and the result of that function doesn't change unless its dependencies change.

```jsx
import React, { useState, useMemo } from 'react';

const MyComponent = () => {
  const [count, setCount] = useState(0);

  // Expensive computation function
  const expensiveFunction = () => {
    console.log('Computing...');
    let result = 0;
    for (let i = 0; i < 1000000; i++) {
      result += i;
    }
    return result;
  };

  // Memoize the result of the expensive function
  const memoizedValue = useMemo(() => expensiveFunction(), []);

  return (
    <div>
      <p>Count: {count}</p>
      <p>Result of expensive computation: {memoizedValue}</p>
      <button onClick={() => setCount(count + 1)}>Increment</button>
    </div>
  );
};

export default MyComponent;
```

In this example, `expensiveFunction` is computationally expensive and doesn't depend on any state or props. By wrapping it inside `useMemo`, we ensure that the function is only called once during the initial render and its result is memoized. This prevents unnecessary recalculations on subsequent renders.

## 4. What’s the difference between useMemo() and useCallback() hooks?

- `useMemo()` is used to memoize the result of a function so that it's not recalculated on every render unless its dependencies change. It's useful for optimizing expensive computations.
- `useCallback()` is used to memoize callback functions so that they're not recreated on every render unless their dependencies change. It's useful for optimizing the performance of components that rely on callback props, preventing unnecessary re-renders.