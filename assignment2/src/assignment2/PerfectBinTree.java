package assignment2;

import be.ac.ua.ansymo.adbc.annotations.invariant;

@invariant("$this.sameHeight() == true")
public class PerfectBinTree extends FullBinTree {

	public PerfectBinTree(long id) {
		super(id);
	}

	public boolean sameHeight() {
		int leftHeight = (this.getLeft() != null) ? this.getLeft().height() : 0;
		int rightHeight = (this.getRight() != null) ? this.getRight().height() : 0;
		
		return leftHeight == rightHeight;
	}
	
}
