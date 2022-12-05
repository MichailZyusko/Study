<!DOCTYPE html>
<html>

<body>
  Answer:
  <pre>
  <?php
  class BinaryNode {
    public $value;
    public $left = NULL;
    public $right = NULL;
    public function __construct ($value) {
      $this->value = $value;
    }
  }

  class BinaryTree {
    public $root = NULL;
	  public function isEmpty () {
		  return is_null($this->root);
	  }

	  public function insert ($value) {
		  $node = new BinaryNode($value);
		  $this->insertNode($node, $this->root);
	  }

	  protected function insertNode (BinaryNode $node, &$subtree) {
		  if (is_null($subtree)) {
			  $subtree = $node;
		  }
      else {
			  if ($node->value < $subtree->value) {
				  $this->insertNode($node, $subtree->left);
			  }
			  elseif ($node->value > $subtree->value) {
				  $this->insertNode($node, $subtree->right);
			  }
		  }

		  return $this;
	  }

	  public function delete ($value) {
		  if ($this->isEmpty()) {
			  throw new \UnderflowException('Tree is empty!');
		  }

		  $node = &$this->findNode($value, $this->root);
		  if ($node) {
			  $this->deleteNode($node);
		  }
		  return $this;
	  } 

	  protected function &findNode ($value, &$subtree) {
	  	if (is_null($subtree)) {
	  		return FALSE;
		  }

	  	if ($subtree->value > $value) {
		  	return $this->findNode($value, $subtree->left);
		  }
	  	elseif ($subtree->value < $value) {
		  	return $this->findNode($value, $subtree->right);
	  	}
	  	else {
			  return $subtree;
		  }
	  }

	  protected function deleteNode (BinaryNode &$node) {
	  	if (is_null($node->left) && is_null($node->right)) {
	  		$node = NULL;
	  	}
	  	elseif (is_null($node->left)) {
	  		$node = $node->right;
	  	}
	  	elseif (is_null($node->right)) {
		  	$node = $node->left;
	  	}
		  else {
		  	if (is_null($node->right->left)) {
			  	$node->right->left = $node->left;
			  	$node = $node->right;
		  	}
		  	else {
		  		$node->value = $node->right->left->value;
			  	$this->deleteNode($node->right->left);
		  	}
		  }
	  }

	  public function dump () {
		  var_dump($this->root);
	  }
}

function getRandomTree(int $length): BinaryTree {
  $tree = new BinaryTree;
  for ($i = 0; $i < $length; $i++) {
    $r = rand(0, 50);
    $tree->insert($r);
    echo "$r ";
  }
  echo "\n\Tree: ";
  printTree($tree);

  return $tree;
}

function printTree(BinaryTree $tree) {
  echo json_encode($tree, JSON_PRETTY_PRINT);
}

  $tree1 = getRandomTree(50);
  $tree1->insert(101);
  echo "\nTree After Insert (101):\n";
  printTree($tree1);
  $tree1->delete(101);
  echo "\nTree After Delete (101):\n";
  printTree($tree1);
  

  ?>   
  </pre>
</body>

</html>