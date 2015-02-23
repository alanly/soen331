package assignment2.bintree.base;

import be.ac.ua.ansymo.adbc.annotations.ensures;
import be.ac.ua.ansymo.adbc.annotations.invariant;
import be.ac.ua.ansymo.adbc.annotations.requires;

@invariant("$this.height() != 0")
public class BinTree implements IBinTree {

	protected long id;
	private IBinTree left;
	private IBinTree right;
	
	@requires("id != null")
	@ensures({"$this.left == null", "$this.right == null"})
	public BinTree(long id) {
		this.id = id;
	}

	@Override
	public IBinTree getLeft() {
		return this.left;
	}

	@Override
	public IBinTree getRight() {
		return this.right;
	}

	@requires({"bt != null", "$this.left == null"})
	@ensures({"$this.left != null", "$this.left == bt"})
	@Override
	public void setLeft(IBinTree bt) {
		this.left = bt;
	}

	@requires({"bt != null", "$this.right == null"})
	@ensures({"$this.right != null", "$this.right == bt"})
	@Override
	public void setRight(IBinTree bt) {
		this.right = bt;
	}
	
	@requires({"left != null", "right != null", "$this.left == null", "$this.right == null"})
	@ensures({"$this.left != null", "$this.right != null", "$this.left == left", "$this.right == right"})
	public void setLeftRight(IBinTree left, IBinTree right) {
		this.left = left;
		this.right = right;
	}

	@Override
	public boolean hasLeft() {
		return this.left != null;
	}

	@Override
	public boolean hasRight() {
		return this.right != null;
	}

	@Override
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

	@Override
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
		if (this.left == null && this.right == null) {
			return true;
		}
		if (this.left != null && this.right != null) {
			return this.getLeft().isTwoOrNoLeaf() && this.getRight().isTwoOrNoLeaf();
		}
		
		return false;
	}

}
