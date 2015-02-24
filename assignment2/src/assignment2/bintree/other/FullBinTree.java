package assignment2.bintree.other;

import assignment2.bintree.base.BinTree;
import be.ac.ua.ansymo.adbc.annotations.invariant;

@invariant({"$super", "$this.isTwoOrNoLeaf() == true"})
public class FullBinTree extends BinTree {

	public FullBinTree(long id) {
		super(id);
	}

}
