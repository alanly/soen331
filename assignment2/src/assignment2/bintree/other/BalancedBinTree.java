package assignment2.bintree.other;

import assignment2.bintree.base.BinTree;
import be.ac.ua.ansymo.adbc.annotations.invariant;

@invariant({"$super", "$this.isBalanced() == true"})
public class BalancedBinTree extends BinTree {

	public BalancedBinTree(long id) {
		super(id);
	}
	
}
