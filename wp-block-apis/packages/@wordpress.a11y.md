# Installation
```bash
npm install @wordpress/a11y --save
```

# API
Basically you add those when there are hooks which might result in updated content in UI.
```js
import { speak } from '@wordpress/a11y';

// For polite messages that shouldn't interrupt what screen readers are currently announcing.
speak( 'The message you want to send to the ARIA live region' );

// For assertive messages that should interrupt what screen readers are currently announcing.
speak( 'The message you want to send to the ARIA live region', 'assertive' );
```

