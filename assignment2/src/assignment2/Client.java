package assignment2;

import assignment2.bintree.base.BinTree;

public class Client {

	public static void main(String[] args) {
		Client c = new Client();
		
		// Test BinTree (Binary Tree)
		if (c.testBinaryTree()) {
			System.out.println("BinTree Passed.");
		}
	}
	
	private boolean testBinaryTree() {
		BinTree[] bt = new BinTree[5];
		
		for (int i = 0; i < 5; ++i) {
			// Create 5 new instances, identified from 0..4
			bt[i] = new BinTree(i);
			
			// Contract 1: Ensure that the newly created instance does not have a height of zero.
			assert(bt[i].height() != 0);
			
			// Contract 3: Ensure newly created instance does not have a left or right node.
			assert(! bt[i].hasLeft());
			assert(! bt[i].hasRight());
		}
		
		// Contract 4: setLeft rejects null parameter.
		//bt[0].setLeft(null); // Should error out.
		bt[0].setLeft(bt[1]);
		
		// Contract 6: left is no longer null
		assert(bt[0].getLeft() != null);
		
		// Contract 7: left is the node we expect.
		assert(bt[0].getLeft() == bt[1]);
		
		// Constract 8: setRight rejects null parameter.
		//bt[0].setRight(null); // Should error out.
		bt[0].setRight(bt[2]);
		
		// Contract 10: right is no longer null
		assert(bt[0].getRight() != null);
		
		// Contract 11: right is the node we expect
		assert(bt[0].getRight() == bt[2]);
		
		// Contract 5: setLeft will not overwrite existing node.
		bt[0].setLeft(bt[3]);
		assert(bt[0].getLeft() != bt[3]);
		assert(bt[0].getLeft() == bt[1]);
		
		// Contract 9: setRight will not overwrite existing node.
		bt[0].setRight(bt[4]);
		assert(bt[0].getRight() != bt[4]);
		assert(bt[0].getRight() == bt[2]);
		
		return true;
	}
	
	private boolean testBalancedBinaryTree() {
		return true;
	}
	
	private boolean testFullBinaryTree() {
		return true;
	}
	
	private boolean testPerfectBinaryTree() {
		return true;
	}

}
