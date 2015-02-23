package assignment2;

import be.ac.ua.ansymo.adbc.annotations.ensures;
import be.ac.ua.ansymo.adbc.annotations.requires;

public class BinTree implements IBinTree {

	@SuppressWarnings("unused")
	private long id;
	private BinTree left;
	private BinTree right;
	
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
	public void setLeft(BinTree bt) {
		this.left = bt;
	}

	@requires({"bt != null", "$this.right == null"})
	@ensures({"bt != null", "$this.right == bt"})
	@Override
	public void setRight(BinTree bt) {
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
		int i = 0;
		
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
		int l = 0;
		int r = 0;
		
		if (left != null) {
			l = left.sumNodes();
		}
		if (right != null) {
			r += right.sumNodes();
		}
		
		return ((l > r) ? l : r);
	}

}
