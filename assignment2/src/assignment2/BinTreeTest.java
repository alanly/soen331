package assignment2;

public class BinTreeTest {

	public static void main(String[] args) {
		BinTree bt = new BinTree(1);
		
		//setLeft(BinTree iBinTree) will reject parameters which are null.
		//bt.setLeft(null);
		
		bt.setLeft(new BinTree(2));
		
		//setLeft(BinTree iBinTree) will make sure it is not overwriting a node.
		//bt.setLeft(new BinTree(3));
		
		//setRight(BinTree iBinTree) will reject parameters which are null.
		//bt.setRight(null);
		
		bt.setRight(new BinTree(4));
		
		//setRight(BinTree iBinTree) will make sure it is not overwriting a node.
		//bt.setRight(new BinTree(5));
	}

}
