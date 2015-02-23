package assignment2;

public class BinTreeTest {

	public static void main(String[] args) {
		binTreeTest();
		balancedBinTreeTest();
		isTwoOrNoLeafTest();
		System.out.println("Done.");
	}

	static void binTreeTest() {
		BinTree bt1 = new BinTree(1);
		BinTree bt2 = new BinTree(2);
		BinTree bt3 = new BinTree(3);
		BinTree bt4 = new BinTree(4);
		BinTree bt5 = new BinTree(5);
		BinTree bt6 = new BinTree(6);
		BinTree bt7 = new BinTree(7);
		BinTree bt8 = new BinTree(8);
		BinTree bt9 = new BinTree(9);
		BinTree bt10 = new BinTree(10);
		BinTree bt11 = new BinTree(11);
		BinTree bt12 = new BinTree(12);
		BinTree bt13 = new BinTree(13);
		
		bt1.setLeft(bt2);
		bt1.setRight(bt3);
		
		bt2.setLeft(bt4);
		bt2.setRight(bt5);
		
		bt3.setLeft(bt6);
		bt3.setRight(bt7);
		
		bt4.setLeft(bt8);
		bt4.setRight(bt9);
		
		bt5.setLeft(bt10);
		bt5.setRight(bt11);
		
		bt7.setRight(bt12);
		
		bt12.setLeft(bt13);

		System.out.println("Built new BinTree with height " + bt1.height() + " and " + bt1.sumNodes() + " total nodes.");
	}
	
	static void balancedBinTreeTest() {
		BalancedBinTree bt1 = new BalancedBinTree(1);
		BinTree bt2 = new BinTree(2);
		BinTree bt3 = new BinTree(3);
		BinTree bt4 = new BinTree(4);
		BinTree bt5 = new BinTree(5);
		BinTree bt6 = new BinTree(6);
		BinTree bt7 = new BinTree(7);
		BinTree bt8 = new BinTree(8);
		BinTree bt9 = new BinTree(9);
		BinTree bt10 = new BinTree(10);
		BinTree bt11 = new BinTree(11);
		BinTree bt12 = new BinTree(12);
		BinTree bt13 = new BinTree(13);
		BinTree bt14 = new BinTree(14);
		BinTree bt15 = new BinTree(15);
		
		bt1.setLeft(bt2);
		bt1.setRight(bt3);
		
		bt2.setLeft(bt4);
		bt2.setRight(bt5);
		
		bt3.setLeft(bt6);
		bt3.setRight(bt7);
		
		bt4.setLeft(bt8);
		bt4.setRight(bt9);
		
		bt5.setLeft(bt10);
		bt5.setRight(bt11);
		
		bt6.setLeft(bt12);
		bt6.setRight(bt13);
		
		bt7.setLeft(bt14);
		bt7.setRight(bt15);

		System.out.println("Built new BalancedBinTree with height " + bt1.height() + " and " + bt1.sumNodes() + " total nodes.");
	}
	
	static void isTwoOrNoLeafTest() {
		BinTree bt1 = new BinTree(1);
		System.out.println("Should be true: " + bt1.isTwoOrNoLeaf());
		BinTree bt2 = new BinTree(2);
		bt1.setLeft(bt2);
		System.out.println("Should be false: " + bt1.isTwoOrNoLeaf());
		BinTree bt3 = new BinTree(3);
		bt1.setRight(bt3);
		System.out.println("Should be true: " + bt1.isTwoOrNoLeaf());
	}
	
}
