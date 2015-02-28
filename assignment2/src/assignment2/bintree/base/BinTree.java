package assignment2.bintree.base;

import be.ac.ua.ansymo.adbc.annotations.ensures;
import be.ac.ua.ansymo.adbc.annotations.invariant;
import be.ac.ua.ansymo.adbc.annotations.requires;

@invariant("$this.height() != 0")
public class BinTree implements IBinTree {

	protected long id;
	private BinTree left;
	private BinTree right;
	
	@ensures({"$this.left == null", "$this.right == null"})
	public BinTree(long id) {
		this.id = id;
	}

	public BinTree getLeft() {
		return this.left;
	}

	public BinTree getRight() {
		return this.right;
	}

	@requires({"bt != null"})
	@ensures({"$this.left != null", "($old($this.left)==null)?($this.left==bt):($this.left==$old($this.left))"})
	public void setLeft(IBinTree bt) {
		this.left = (BinTree) bt;
	}

	@requires({"bt != null"})
	@ensures({"$this.right != null", "($old($this.right)==null)?($this.right==bt):($this.right==$old($this.right))"})
	public void setRight(IBinTree bt) {		
		this.right = (BinTree) bt;
	}
	
	@requires({"left != null", "right != null", "$this.left == null", "$this.right == null"})
	@ensures({"$this.left != null", "$this.right != null", "$this.left == left", "$this.right == right"})
	public void setLeftRight(IBinTree left, IBinTree right) {
		this.left = (BinTree) left;
		this.right = (BinTree) right;
	}

	public boolean hasLeft() {
		return this.left != null;
	}

	public boolean hasRight() {
		return this.right != null;
	}

	public int sumNodes() {
		int i = 1;
		
		if (this.left != null) {
			i += this.left.sumNodes();
		}
		
		if (this.right != null) {
			i += this.right.sumNodes();
		}
		
		return i;
	}

	public int height() {
		int leftHeight = (this.left != null) ? this.left.height() : 0;
		int rightHeight = (this.right != null) ? this.right.height() : 0;
		
		return Math.max(leftHeight, rightHeight) + 1;
	}
	
	public boolean isBalanced() {
		int leftHeight = (this.left == null) ? 0 : this.left.height();
		int rightHeight = (this.right == null) ? 0 : this.right.height();
		
		return Math.abs(leftHeight - rightHeight) < 2;
	}

	public boolean isTwoOrNoLeaf() {
		boolean hasLeft = this.hasLeft();
		boolean hasRight = this.hasRight();
		
		if (hasLeft != hasRight) return false;
		
		if (! (hasLeft && hasRight)) return true;
		
		return this.left.isTwoOrNoLeaf() && this.right.isTwoOrNoLeaf();
	}

}
