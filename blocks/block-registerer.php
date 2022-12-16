<?php
/**
 * Automatic PHP block initializer based on JSON files
 * 
 * @package WordPress
 * @author Estevão Rolim <ETVO@github.com>
 */

class Block_Registerer {

    private $blocks = [];

    /**
     * Trigger core functions
     * 
     * @since 1.0
     */
    public function __construct()
    {
        // Retrieve blocks from the JSON blocks
        $this->set_blocks_from_JSON('blocks.json');

        // Register all blocks
        $this->register_blocks($this->get_blocks());
    }

    /**
     * Set blocks property
     *
     * @param array $array
     * @since 1.0
     */
    public function set_blocks(array $array) {
        $this->blocks = $array;
    }

    /**
     * Get blocks property
     *
     * @return array
     * @since 1.0
     */
    public function get_blocks(): array {
        return $this->blocks;
    }

    /**
     * Retrieve blocks from JSON file and set value to local variable
     *
     * @param string $file_path Path to the JSON file
     * @since 1.0
     */
    public function set_blocks_from_JSON(string $file_path) {
        $content = file_get_contents(__DIR__ . '/' . $file_path);
        $blocks_data = json_decode($content, true);
        $this->set_blocks($blocks_data['blocks']);
    }

    /**
     * Register an array of blocks and its children (recursively) 
     *
     * @param array $blocks
     * @param string $path_prefix
     * @since 1.0
     */
    public function register_blocks(array $blocks, string $path_prefix = "") {
        $dir = __DIR__ . '/';

        foreach($blocks as $block) {

            if(substr($path_prefix, -1) !== '/') $path_prefix .= '/';

            $path = $block["path"];
            
            $block_data = file_get_contents($dir . $path_prefix . $path . '/block.json');
            $block_data = json_decode($block_data, true);
            
            $slug = $block_data['slug'];
            $categ = $block_data['categ'];
            $render_callback = $block_data["renderCallback"];
            $children = $block_data["children"];

            $this->register_block($slug, $categ, $path_prefix . $path, $render_callback);

            if($children !== NULL && count($children) > 0) {
                $this->register_blocks($block_data["children"], $path_prefix . $path );
            }
        }
    }

    /**
     * Register an individual block
     *
     * @param string $slug
     * @param string $categ
     * @param string $path
     * @param string $render_callback
     * @since 1.0
     */
    private function register_block(string $slug, string $categ, string $path, string $render_callback = NULL) {
        $slug = str_replace('-', '_', $slug);

        if($render_callback === NULL)
            $render_callback = 'render_block_' . $slug;

        register_block_type(
            $categ . '/' . $slug,
            array(
                'render_callback' => $render_callback
            )
        );
        
        include __DIR__ . '/' . $path . '/block.php';
    }


}

new Block_Registerer();