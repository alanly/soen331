package assignment2;

import be.ac.ua.ansymo.adbc.annotations.invariant;

@invariant("$this.isBalanced() == true")
public class BalancedBinTree extends BinTree {

	public BalancedBinTree(long id) {
		super(id);
	}

	public boolean isBalanced() {
		int lh = 0;
		int rh = 0;
		
		if (this.getLeft() != null) {
			lh = this.getLeft().height();
		}
		if (this.getRight() != null) {
			lh = this.getRight().height();
		}
		if (Math.abs(lh - rh) < 2) {
			return true;
		}
		
		return false;
	}
	
}
