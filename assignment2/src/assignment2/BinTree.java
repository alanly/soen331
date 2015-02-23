package assignment2;

import be.ac.ua.ansymo.adbc.annotations.ensures;
import be.ac.ua.ansymo.adbc.annotations.requires;

public class BinTree implements IBinTree {

	protected long id;
	private IBinTree left;
	private IBinTree right;
	
	@ensures({"id != null", "$this.left == null", "$this.right == null"})
	public BinTree(long id) {
		this.id = id;
	}

	@Override
	public IBinTree getLeft() {
		return left;
	}

	@Override
	public IBinTree getRight() {
		return right;
	}

	@requires({"bt != null", "$this.left == null"})
	@ensures({"bt != null", "$this.left == bt"})
	@Override
	public void setLeft(IBinTree bt) {
		this.left = bt;
	}

	@requires({"bt != null", "$this.right == null"})
	@ensures({"bt != null", "$this.right == bt"})
	@Override
	public void setRight(IBinTree bt) {
		this.right = bt;
	}

	@Override
	public boolean hasLeft() {
		return left == null;
	}

	@Override
	public boolean hasRight() {
		return right == null;
	}

	@Override
	public int sumNodes() {
		int i = 1;
		
		if (left != null) {
			i += left.sumNodes();
		}
		
		if (right != null) {
			i += right.sumNodes();
		}
		
		return i;
	}

	@Override
	public int height() {
		int leftHeight = (this.left != null) ? this.left.height() : 0;
		int rightHeight = (this.right != null) ? this.right.height() : 0;
		
		return Math.max(leftHeight, rightHeight) + 1;
	}

}
