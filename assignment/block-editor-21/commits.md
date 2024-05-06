
Setup completed for plugin `rt-custom-post`

Description:
1. Created a plugin called `rt-custom-post`.
2. Updated PHPCS to adapt for the plugin domains.
3. Added necessary files for block like `block.json`, `index.js` etc.
4. Setup completed for Gutenberg block.

Added custom post type `rt-custom-post` to plugin `rt-custom-post` 

Description:
1. Added custom post type `rt-custom-post`
2. Imported the file in plugin root file.

Feature: Added search and select post functionality

Description:
1. Added search bar
2. Results are displayed as a radio group.
3. SSR render.php is added



# Movie Blocks

Setup completed for movie blocks

Description:
1. Added necessary files for block like `block.json`, `index.js` etc.
2. Setup completed for Gutenberg block.
3. Created separate folders for movie, movies widget


Added movie block

Description:
- Display movie with following information.
    
    - Title
    - Poster
    - Release Date
    - Director Name
    - First two actor/star names.
- Block options.
    - Dropdown/Autocomplete to select single movie post.

Added movies block

Description:
- Display list of movies with following information.
    - Title
    - Poster
    - Release Date
    - Director Name
    - First two actor/star names.
- Block options to filter movie posts.
    - Count - To display total number of movies.
    - Director taxonomy dropdown (term id => term name)
    - Genre taxonomy dropdown (term id => term name)
    - Label taxonomy dropdown (term id => term name)
    - Language taxonomy dropdown (term id => term name)
- Created custom REST endpoint for fetching directors.

Added person block

Description:
- `Person` Block
- To display person with following information.
    - Name
    - Profile Picture
    - Career
- Block options.
    - Dropdown to select single person post.

Added persons block

Description:
- To display list of persons with following information.
    
    - Name
    - Profile Picture
    - Career
- Block options to filter persons posts.
    
    - Count - To display total number of persons.