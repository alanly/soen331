package assignment2;

import be.ac.ua.ansymo.adbc.annotations.invariant;

@invariant({"$super", "$this.isBalanced() == true"})
public class BalancedBinTree extends BinTree {

	public BalancedBinTree(long id) {
		super(id);
	}
	
}
