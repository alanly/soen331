package assignment2;

public class BinTreeTest {

	public static void main(String[] args) {
		binTreeTest();
		balancedBinTreeTest();
		System.out.println("Done.");
	}

	static void binTreeTest() {
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
	
	static void balancedBinTreeTest() {
		BalancedBinTree bt = new BalancedBinTree(1);
		bt.setLeft(new BalancedBinTree(2));
		
		BalancedBinTree bt2 = new BalancedBinTree(3);
		bt2.setLeft(new BalancedBinTree(4));
		//bt2.setRight(new BalancedBinTree(5));
		bt.setRight(bt2);
		
		BalancedBinTree bt3 = new BalancedBinTree(3);
		bt3.setLeft(new BalancedBinTree(4));
		bt3.setRight(new BalancedBinTree(5));
		bt2.setRight(bt3);
		//bt.isBalanced();
	}
	
}