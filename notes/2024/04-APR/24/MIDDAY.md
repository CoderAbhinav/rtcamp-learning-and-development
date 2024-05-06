# Basic React : 24th April 2024 #181
## 1. How do lists work in React ?
Lists in React work by mapping an array of data to React elements. This is typically done using the `map()` function to iterate over the array and generate a list of React components based on the data.
```javascript
const MyList = ({ items }) => {
  return (
    <ul>
      {items.map((item, index) => (
        <li key={index}>{item}</li>
      ))}
    </ul>
  );
};
```
## 2. Explain the flux concept in React
Flux is a design pattern used for managing state in React applications. It emphasises unidirectional data flow, where data flows in a single direction through the application, making it easier to understand and debug. Flux consists of four main components:
- **Actions**: Represent events that occur in the application.
- **Dispatcher**: Dispatches actions to registered callbacks.
- **Stores**: Contain the application state and logic for handling actions.
- **Views (React Components)**: Render the application UI based on the data from stores.

## 3. What is a synthetic event in React JS ?
1. Synthetic events in React are a cross-browser wrapper around the browser's native events.
2. They have the same interface as native events but work consistently across different browsers. Synthetic events are used in React to handle user interactions and are automatically managed by React.
## 4. Explain the lifecycle of React
- **Initialization**: The component is created and its initial state and props are set.
- **Mounting**: The component is inserted into the DOM.
- **Updating**: The component re-renders when its state or props change.
- **Unmounting**: The component is removed from the DOM.
- **Error Handling**: If an error occurs during rendering, the componentDidCatch() method is called.
## 5. How will you memoize a component in React ?
Memoization in React is a technique used to optimize the rendering performance of functional components. It involves caching the result of expensive calculations so that they can be reused when the component re-renders with the same props.

```javascript
import React, { useMemo } from 'react';

const MyComponent = ({ data }) => {
  const processedData = useMemo(() => {
    // Expensive data processing
    return processData(data);
  }, [data]); // Only recompute when 'data' prop changes

  return <div>{processedData}</div>;
};
```

cc @abhishekfdd