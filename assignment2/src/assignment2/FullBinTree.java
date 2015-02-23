package assignment2;

import be.ac.ua.ansymo.adbc.annotations.invariant;

@invariant("$this.isTwoOrNoLeaf() == true")
public class FullBinTree extends BinTree {

	public FullBinTree(long id) {
		super(id);
	}

}
