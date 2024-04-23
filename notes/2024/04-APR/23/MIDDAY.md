# Basic React : 23rd April 2024 #180
## 1. How is routing in React different from Conventional routing?
1. In React, routing is typically handled using libraries like `React Router`.
2. Router enables declarative routing where components are rendered based on the `URL`.
3. Routes are defined using `JSX` components, making it easy to manage navigation within a single-page application (SPA). And they are handled on client side.
4. In traditional web development, routing is based on server-side navigation, where different URLs correspond to different HTML pages.
5. Each page typically requires a full server request/response cycle, resulting in slower navigation compared to SPAs.
## 2. What are the predefined prop types present in React?
React provides a built-in library called `PropTypes` for type-checking props passed to components.

| Type         | Classes           |
| ------------ | ----------------- |
| **String**   | `PropType.string` |
| **Object**   | `PropType.object` |
| **Number**   | `PropType.number` |
| **Boolean**  | `PropType.bool`   |
| **Function** | `PropType.func`   |
| **Symbol**   | `PropType.symbol` |
## 3. What are higher-order components (HOCs) used for?
1. A higher-order component (HOC) is an advanced technique in React for reusing component logic. 
2. HOCs are not part of the React API, per se. They are a pattern that emerges from React’s compositional nature.

```javaScript
// Example of Higher-Order Component (HOC) in React
import React from 'react';

const withLogger = (WrappedComponent) => {
  return class extends React.Component {
    componentDidMount() {
      console.log(`Component ${WrappedComponent.name} mounted.`);
    }

    render() {
      return <WrappedComponent {...this.props} />;
    }
  };
};

// Usage
const MyComponent = () => {
  return <div>Hello, World!</div>;
};

export default withLogger(MyComponent);

```


## 4. What is the use of the second argument that is passed to `setState`? Is it optional?

1. The second argument in `setState` is a callback function that is executed after the state has been updated. It's optional and can be useful for performing actions that depend on the updated state.

```javaScript
// Example of setState second argument usage in React
import React, { useState } from 'react';

const Counter = () => {
  const [count, setCount] = useState(0);

  const increment = () => {
    setCount((prevCount) => prevCount + 1, () => {
      console.log('Count has been updated:', count);
    });
  };

  return (
    <div>
      <p>Count: {count}</p>
      <button onClick={increment}>Increment</button>
    </div>
  );
};

export default Counter;

```
## 5. What is the difference between using `getInitialState` and `constructors` in React?

In older versions of React, components could define an initial state using the `getInitialState` method. However, with the introduction of ES6 classes, the constructor method is now used to initialize state and bind event handlers. The main difference is that `getInitialState` is specific to React's createClass syntax, while constructors are part of standard ES6 class syntax.


```javascript
// Example illustrating the use of constructor and state initialization in React
import React, { Component } from 'react';

class MyComponent extends Component {
  constructor(props) {
    super(props);
    this.state = {
      message: 'Hello, World!',
    };
  }

  render() {
    return <div>{this.state.message}</div>;
  }
}

export default MyComponent;

```

cc @abhishekfdd